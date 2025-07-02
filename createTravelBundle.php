<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';
require_once 'classes/includes/Travel.inc.php';

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
    // Basic input validation
    $hotel_name = trim($_POST['hotel_name']);
    $country = trim($_POST['country']);
    $hotel_address = trim($_POST['hotel_address']);
    $city = trim($_POST['city']);
    $available_spaces = (int) $_POST['available_spaces'];
    $price = (float) $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $img_path = trim($_POST['img_path']); // assuming this is a string URL

    // Save hotel, get hotelid
    $hotelid = Travel::createHotel($link, $hotel_name, $hotel_address, $city, $country);

    if ($hotelid) {
        // Correct parameter order and count
        $success = Travel::createTravelBundle($link, $hotelid, $available_spaces, $price, $start_date, $end_date, $img_path);
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