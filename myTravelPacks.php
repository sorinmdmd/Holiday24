<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Travel.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';
require_once 'classes/includes/MailService.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "My Travel Packs";
$smarty->assign('title', htmlentities($title));
    
// Standard: keine Fehlermeldung
$no_results = false;
    
// Standard: keine Fehlermeldung
$no_results = false;

// Benutzerdaten holen
$me = Travel::getUserById($link, $_SESSION['user_id']);
$userEmail = $me[0]['email'] ?? null;

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);

    $bookings = Travel::getBookingsForUser($link, $_SESSION['user_id']);
    $smarty->assign('bookings', $bookings);

    // Message zeigen, falls keine gebuchten Reisepakete
    if(empty($bookings)){
        $no_results = true;
    }
}

// Bestimmen, welche Art von Benutzer angemeldet ist (admin?)
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}

// Buchungsstornierung
if (isset($_POST['cancel_booking']) && isset($_SESSION['user_id'])) {
    $travelbundleid = $_POST['travelbundleid'];
    $success = Travel::cancelBooking($link, $_SESSION['user_id'], $travelbundleid);
    
    if ($success) {
        header("Location: myTravelPacks.php?cancel_success=1");
        $mailService = new MailService();
        $mailService->sendCancelConfirmation($userEmail);
    } else {
        header("Location: myTravelPacks.php?cancel_error=1");
    }
    exit();
} 

$smarty->assign('no_results', $no_results);
$smarty->assign('activePage', 'myTravelPacks');
$smarty->display('myTravelPacks.tpl');
?>