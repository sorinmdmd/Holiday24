<?php
/**
 * Admin Panel - Verwaltungsbereich für Holiday24 Reisebüro
 * 
 * Diese Datei stellt das Admin-Panel für die Holiday24 Anwendung bereit.
 * Administratoren können hier Reisepakete verwalten (erstellen, bearbeiten, löschen)
 * und Benutzer verwalten.
 * 
 * Funktionalitäten:
 * - Anzeige aller Reisepakete (Travel Bundles)
 * - Bearbeitung von Reisepaketen (Hotels, Verfügbarkeit, Preise, Daten)
 * - Erstellung neuer Reisepakete
 * - Benutzerverwaltung (Anzeige und Löschung von Benutzern)
 * - Session-basierte Authentifizierung
 */
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';
require_once 'classes/includes/Customer.inc.php';
require_once 'classes/includes/Travel.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();

$title = "Admin Panel";
$smarty->assign('title', htmlentities($title));

$users = Customer::getUserDetails($link);

$travelbundles = Travel::getTravelbundles($link);
$smarty->assign('travelbundles', $travelbundles);

$hotels = Travel::getAllHotels($link);
$smarty->assign('hotels', $hotels);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_travelpack'])) {
    $id = $_POST['travelpack_id'];
    $hotelid = $_POST['hotelid'];
    $available_spaces = $_POST['available_spaces'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if ($end_date <= $start_date) {
        $smarty->assign('edit_error', 'End date must be after the start date.');
        
        $editBundle = [
            'id' => $id,
            'hotelid' => $hotelid,
            'available_spaces' => $available_spaces,
            'price' => $price,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'city' => '', 
        ];
        $smarty->assign('editBundle', $editBundle);
    } else {
        $success = Travel::updateTravelBundle($link, $id, $hotelid, $available_spaces, $price, $start_date, $end_date);
        if ($success) {
            header("Location: adminPanel.php?edit_success=1");
            exit();
        } else {
            $smarty->assign('edit_error', 'Failed to update travel pack');
            $editBundle = [
                'id' => $id,
                'hotelid' => $hotelid,
                'available_spaces' => $available_spaces,
                'price' => $price,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'city' => '',
            ];
            $smarty->assign('editBundle', $editBundle);
        }
    }
}

if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $editBundle = Travel::getTravelBundleById($link, $_GET['edit']);
    $smarty->assign('editBundle', $editBundle);
}

if (isset($_GET['create']) && $_GET['create'] == 1) {
    $editBundle = [
        'id' => null,
        'hotelid' => '',
        'available_spaces' => '',
        'price' => '',
        'start_date' => '',
        'end_date' => '',
        'city' => '',
    ];
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
$smarty->assign('users', $users);
$smarty->assign('activePage', 'adminPanel');
$smarty->display('adminPanel.tpl');
?>