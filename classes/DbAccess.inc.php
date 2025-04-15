<?php

class DbAccess
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

    public static function getFilteredTravelbundles($link, $country = null, $month = null, $travelers = null) {
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
    
    
}