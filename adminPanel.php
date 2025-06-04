<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/Customer.inc.php';
require_once 'classes/Travel.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();

$title = "Admin Panel";
$smarty->assign('title', htmlentities($title));

$users = Travel::getUserDetails($link);

$travelbundles = Travel::getTravelbundles($link);
$smarty->assign('travelbundles', $travelbundles);

// Get all hotels for edit form
$hotels = Travel::getAllHotels($link);
$smarty->assign('hotels', $hotels);

// Handle edit form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_travelpack'])) {
    $id = $_POST['travelpack_id'];
    $hotelid = $_POST['hotelid'];
    $available_spaces = $_POST['available_spaces'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $success = Travel::updateTravelBundle($link, $id, $hotelid, $available_spaces, $price, $start_date, $end_date);
    
    if ($success) {
        header("Location: adminPanel.php?edit_success=1");
        exit();
    } else {
        $smarty->assign('edit_error', 'Failed to update travel pack');
    }
}

// Handle edit request (GET parameter)
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $editBundle = Travel::getTravelBundleById($link, $_GET['edit']);
    $smarty->assign('editBundle', $editBundle);
}

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $userId = $_POST['delete_user_id']; 
    if ($userId != 0) {
        Customer::deleteUser($link, $userId);
    }
}
// Assign user_role to Smarty if the user is logged in
$smarty->assign('users', $users);
$smarty->assign('activePage', 'adminPanel');
$smarty->display('adminPanel.tpl');
?>