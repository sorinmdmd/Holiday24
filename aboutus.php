<?php
session_start();

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "About Us";
$smarty->assign('title', htmlentities($title));

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
// Assign user_role to Smarty if the user is logged in
$smarty->display('aboutus.tpl');
?>