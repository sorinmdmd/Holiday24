<?php
session_start();

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Über Uns";
$smarty->assign('ueberschrift', htmlentities($ueberschrift));

// Hier könntest du die Angebote aus der Datenbank laden
// $angebote = Lieferservice::getAngebot($link);
// $smarty->assign('angebote', $angebote);

$smarty->display('aboutus.tpl');
?>