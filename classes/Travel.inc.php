<?php
require_once 'classes/Customer.inc.php';
class Travel
{

    public static function getMonths($link)
    {
        $query = "Select id, name
                    from month";
        return DbFunctions::getHash($link, $query);
    }
    public static function getTravelbundles($link)
    {
        $query = "SELECT t.id, t.country, t.city, t.available_spaces, t.price, t.hotelid, t.img_path, 
                        t.start_date, t.end_date, h.name as hotel_name
                      FROM travelbundle t
                      LEFT JOIN hotel h ON t.hotelid = h.id";
        return DbFunctions::getRows($link, $query);
    }
    public static function getUserDetails($link)
    {
        $query = "SELECT *
                      FROM customer";
        return DbFunctions::getRows($link, $query);
    }

    public static function getUserById($link, $userId)
    {
        $query = "SELECT * FROM customer WHERE id = '" . mysqli_real_escape_string($link, $userId) . "'";
        return DbFunctions::getRows($link, $query);
    }

    public static function verifyUser($link, $userid)
    {
        $query = "UPDATE customer SET verified = 1 WHERE id = ?";

        $stmt = $link->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $stmt->close();
        } else {
            error_log("Error preparing statement: " . $link->error);
        }
    }

    public static function getFilteredTravelbundles($link, $country = null, $month = null, $travelers = null)
    {
        // Eingabeparameter mit = null initialisieren, damit sie ignoriert werden können, falls der User nichts auswählt
        $query = "SELECT t.id, t.country, t.city, t.available_spaces, t.price, t.hotelid, t.img_path,
                         h.name as hotel_name, t.start_date, t.end_date
                  FROM travelbundle t
                  LEFT JOIN hotel h ON t.hotelid = h.id
                  WHERE 1=1";
        $params = [];
        $types = ""; // wird Datentypen der Parameter dokumentieren für mysql_stmt_bind_param

        // Parameter werden mit mysqli_stmt_bind_param() gebündelt, um SQLInjections zu vermeiden
        // Werte werden getrennt vom SQL-Statement verarbeitet
        if ($country) {
            $query .= " AND t.country LIKE ?";
            $params[] = "%$country%";
            $types .= "s";
        }
        if ($month) {
            $query .= " AND MONTH(t.start_date) = ?";
            $params[] = $month;
            $types .= "i";
        }
        if ($travelers) {
            $query .= " AND t.available_spaces >= ?";
            $params[] = $travelers;
            $types .= "i";
        }

        $stmt = mysqli_prepare($link, $query);
        if ($params) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $bundles = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $bundles[] = $row;
        }
        return $bundles;
    }

    public static function getBookingsForUser($link, $user_id)
    {

        $query = "SELECT t.id, t.country, t.city, t.available_spaces, t.price, t.hotelid, t.img_path, 
                        t.start_date, t.end_date, h.name as hotel_name, b.booked_slots
                      FROM booking b
                      INNER JOIN travelbundle t
                      ON b.travelbundleid = t.id
                      INNER JOIN hotel h
                      ON t.hotelid = h.id
                      WHERE customerid = '$user_id';";
        return DbFunctions::getRows($link, $query);

    }

    public static function addBooking($link, $userid, $travelbundleid, $free_slots, $booked_slots)
    {

        $query = "SELECT COUNT(id) FROM booking WHERE customerid = ? AND travelbundleid = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $userid, $travelbundleid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $b);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($b == 0) {
            $bookingid = Customer::generateID();
            $query = "INSERT INTO booking(id, customerid, travelbundleid, booked_slots) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 'ssii', $bookingid, $userid, $travelbundleid, $booked_slots);

            $update_slots = self::updateFreeSlotsForTravelbundle($link, $travelbundleid, $booked_slots);

            if (!$update_slots) {
                return false;
            }
            return mysqli_stmt_execute($stmt);
        }

        // Update available slots for travelbundle
        self::updateFreeSlotsForTravelbundle($link, $travelbundleid, $booked_slots);

        // Update booked slots for booking
        $query = "UPDATE booking SET booked_slots = booked_slots + ? WHERE customerid = ? AND travelbundleid = ?";
        $stmt = mysqli_prepare($link, $query);
        if (!$stmt) {
            error_log("Prepare failed: " . mysqli_error($link));
            return false;
        }
        mysqli_stmt_bind_param($stmt, 'iss', $booked_slots, $userid, $travelbundleid);
        return mysqli_stmt_execute($stmt);
    }


    public static function updateFreeSlotsForTravelbundle($link, $travelbundleid, $booked_slots)
    {
        $query = "UPDATE travelbundle 
                  SET available_spaces = available_spaces - ? 
                  WHERE id = ?";

        $stmt = mysqli_prepare($link, $query);
        if (!$stmt) {
            error_log("Prepare failed: " . mysqli_error($link));
            return false;
        }

        mysqli_stmt_bind_param($stmt, 'is', $booked_slots, $travelbundleid);

        return mysqli_stmt_execute($stmt);
    }

    public static function cancelBooking($link, $customerid, $travelbundleid)
    {
        $query = "SELECT booked_slots FROM booking WHERE customerid = ? AND travelbundleid = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $customerid, $travelbundleid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $booked_slots);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if (!$booked_slots)
            return false;  // Falls keine Buchung gefunden

        // Update available slots (add back the canceled slots)
        $update_success = self::updateFreeSlotsForTravelbundle($link, $travelbundleid, -$booked_slots);
        if (!$update_success)
            return false;

        // Delete the booking
        $query = "DELETE FROM booking WHERE customerid = ? AND travelbundleid = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $customerid, $travelbundleid);
        return mysqli_stmt_execute($stmt);
    }

    public static function getTravelBundleById($link, $id)
    {
        $query = "SELECT t.id, t.country, t.city, t.available_spaces, t.price, t.hotelid, t.img_path, 
                        t.start_date, t.end_date, h.name as hotel_name
                      FROM travelbundle t
                      LEFT JOIN hotel h ON t.hotelid = h.id
                      WHERE t.id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
        return null;
    }
    public static function getAllHotels($link)
    {
        $query = "SELECT id, name FROM hotel ORDER BY name";
        return DbFunctions::getRows($link, $query);
    }
    public static function updateTravelBundle($link, $id, $hotelid, $available_spaces, $price, $start_date, $end_date)
    {
        $query = "UPDATE travelbundle SET hotelid = ?, available_spaces = ?, price = ?, start_date = ?, end_date = ? WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        if (!$stmt) {
            error_log("Prepare failed: " . mysqli_error($link));
            return false;
        }
        mysqli_stmt_bind_param($stmt, 'sidssi', $hotelid, $available_spaces, $price, $start_date, $end_date, $id);
        return mysqli_stmt_execute($stmt);
    }

    public static function createTravelBundle($link, $hotelid, $city, $spaces, $price, $start, $end, $img_path, $country)
    {
        $id = random_int(10000000, 99999999);


        $sql = "INSERT INTO travelbundle (id,hotelid,country, city, available_spaces, price, start_date, end_date, img_path)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_prepare($link, $sql);
        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'iissidsss', $id, $hotelid, $country, $city, $spaces, $price, $start, $end, $img_path);
        return mysqli_stmt_execute($stmt);
    }

    public static function createHotel($link, $name, $adress)
    {
        // Generate a random hotel ID (e.g. 8-digit number)
        $hotelId = random_int(10000000, 99999999);

        $sql = "INSERT INTO hotel (id, name, adress) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'iss', $hotelId, $name, $adress);
        if (!mysqli_stmt_execute($stmt))
            return false;

        return $hotelId; // Return the random hotel ID
    }



}