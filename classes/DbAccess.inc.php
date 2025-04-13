<?php

    class DbAccess {

        public static function getMonths($link)
        {
            $query="Select id, name
                    from month";
            return DbFunctions::getHash($link, $query);
        }
        public static function getTravelbundles($link)
        {
            $query = "SELECT t.id, t.country, t.city, t.available_spaces, t.price, t.hotelid, t.img_path,
                            h.name as hotel_name, t.start_date, t.end_date
                      FROM travelbundle t
                      LEFT JOIN hotel h ON t.hotelid = h.id";
            return DbFunctions::getRows($link, $query);
        }
        public static function getUserDetails($link) {
            $query = "SELECT *
                      FROM customer";
            return DbFunctions::getRows($link, $query);
        }

        public static function getUserById($link, $userId) {
            $query = "SELECT * FROM customer WHERE id = '" . mysqli_real_escape_string($link, $userId) . "'";
            return DbFunctions::getRows($link, $query);
        }

        public static function verifyUser($link, $user_id) {
            $query = "UPDATE users SET verified = 1 WHERE id = ?";
            $stmt = $link->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->close();
        }
    }