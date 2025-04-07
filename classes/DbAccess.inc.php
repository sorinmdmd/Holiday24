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
    }