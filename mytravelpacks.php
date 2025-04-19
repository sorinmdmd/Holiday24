<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/DbAccess.inc.php';
require_once 'classes/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "My Travel Packs";
$smarty->assign('title', htmlentities($title));
    
// Standard: keine Fehlermeldung
$no_results = false;

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);

    $bookings = DbAccess::getBookingsForUser($link, $_SESSION['user_id']);
    $smarty->assign('bookings', $bookings);

    if(empty($bookings)){
        $no_results = true;
    }
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}

if (isset($_POST['cancel_booking']) && isset($_SESSION['user_id'])) {
    $travelbundleid = $_POST['travelbundleid'];
    $success = DbAccess::cancelBooking($link, $_SESSION['user_id'], $travelbundleid);
    
    if ($success) {
        header("Location: mytravelpacks.php?cancel_success=1");
    } else {
        header("Location: mytravelpacks.php?cancel_error=1");
    }
    exit();
} 


$smarty->assign('no_results', $no_results);
$smarty->assign('activePage', 'mytravelpacks');
$smarty->display('mytravelpacks.tpl');

?>