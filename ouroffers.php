<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/DbAccess.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Our Trips";
$smarty->assign('title', htmlentities($title));

$months=DbAccess::getMonths($link);
$smarty->assign('months', $months);

$travelbundles = DbAccess::getTravelbundles($link);
$smarty->assign('travelbundles', $travelbundles);

// Hier könntest du die Angebote aus der Datenbank laden
// $angebote = Lieferservice::getAngebot($link);
// $smarty->assign('angebote', $angebote);
// Assign user_id to Smarty if the user is logged in

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
$smarty->display('ouroffers.tpl');
?>