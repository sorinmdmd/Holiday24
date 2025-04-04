<?php
session_start();

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Unsere Angebote";
$smarty->assign('ueberschrift', htmlentities($ueberschrift));

// Hier könntest du die Angebote aus der Datenbank laden
// $angebote = Lieferservice::getAngebot($link);
// $smarty->assign('angebote', $angebote);
// Assign user_id to Smarty if the user is logged in
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
$smarty->display('angebote.tpl');
?>