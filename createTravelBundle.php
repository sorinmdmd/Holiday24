<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/Travel.inc.php';

DEFINE('ENCODING', 'UTF-8');


$link = DbFunctions::connectWithDatabase();

$title = "Create Travel Bundle";
$smarty->assign('title', htmlentities($title));

// Load hotels for selection
$hotels = Travel::getAllHotels($link);
$smarty->assign('hotels', $hotels);

// Today's date for date picker
$smarty->assign('today', date("Y-m-d"));

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_name = $_POST['hotel_name'];
    $country = $_POST['country'];
    $hotel_address = $_POST['hotel_address'];
    $city = $_POST['city'];
    $available_spaces = $_POST['available_spaces'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $img_path = $_POST['img_path']; // assuming this is a string URL

    // Save hotel, get hotelid
    $hotelid = Travel::createHotel($link, $hotel_name, $hotel_address);

    if ($hotelid) {
        $success = Travel::createTravelBundle($link, $hotelid, $city, $available_spaces, $price, $start_date, $end_date, $img_path,$country);
        if ($success) {
            echo "Travel bundle successfully created!";
        } else {
            echo "Failed to create travel bundle.";
        }
    } else {
        echo "Failed to save hotel.";
    }
}

$smarty->display('createTravelBundle.tpl');
?>