<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/Travel.inc.php';
require_once 'classes/MailService.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Our Trips";
$smarty->assign('title', htmlentities($title));

$months = Travel::getMonths($link);
$smarty->assign('months', $months);

// Standard: alle Travelbundles laden
$travelbundles = Travel::getTravelbundles($link);

// Standard: keine Fehlermeldung
$no_results = false;


// Wenn das Formular abgeschickt wurde, Filter anwenden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = isset($_POST['i_country']) ? trim($_POST['i_country']) : null;
    $month = isset($_POST['month']) ? trim($_POST['month']) : null;
    $travelers = isset($_POST['number_travelers']) ? trim($_POST['number_travelers']) : null;

    $travelbundles = Travel::getFilteredTravelbundles($link, $country, $month, $travelers);

    if (empty($travelbundles)) {
        $no_results = true;
    }

    if (isset($_SESSION['user_id']) && isset($_POST['book_bundle_id']) && isset($_POST['slots'])) {
        //Email Adresse für die Order Confirmation
        $me = Travel::getUserById($link, $_SESSION['user_id']);
        if ($me[0]['verified'] != 1) {
            $smarty->assign('account_not_verified', true);
        } else {
            $userEmail = $me[0]['email'] ?? null;
            $user_id = $_SESSION['user_id'];
            $book_bundle_id = $_POST['book_bundle_id'];
            $booked_slots = intval($_POST['slots']);
            $free_slots = intval($_POST['free_slots']);
            $link = DbFunctions::connectWithDatabase();
            $success = Travel::addBooking($link, $user_id, $book_bundle_id, $free_slots, $booked_slots);

            if ($success) {
                $smarty->assign('booking_success', true);
                $mailService = new MailService();
                $mailService->sendBookingConfirmation($userEmail, $travelbundles, $booked_slots, $book_bundle_id);
            } else {
                $smarty->assign('booking_error', true);
            }
        }

    }
}

$smarty->assign('travelbundles', $travelbundles);
$smarty->assign('no_results', $no_results);

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
$smarty->assign('activePage', 'ourOffers');

// .tpl erst am Ende laden, um Fehler "unknown variable" zu vermeiden!
$smarty->display('ourOffers.tpl');
?>