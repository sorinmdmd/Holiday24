<?php

session_start();

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$ueberschrift = "BEISPIEL";
$smarty->assign('ueberschrift', htmlentities($ueberschrift));


$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

if (!($REQUEST_METHOD == "POST")) {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
    // $smarty->assign('result', $result);
    $smarty->assign('PHP_SELF', $PHP_SELF);
} else {
    if (!isset($_POST["csrf_token"]) || !isset($_SESSION["csrf_token"]) || $_POST["csrf_token"] != $_SESSION["csrf_token"]) {
        unset($_SESSION["csrf_token"]);
        die("CSRF Token ungültig!");
    }

    //HIER SACHEN AUS FORMULAR BEKOMMEN
    //$item = $_POST['item'];

    $correct = true;
    // $correct = Sicherheit::isNumericalMin($arbeitszeit, MIN);

    if (!$correct) {
        $smarty->assign('fehler', true);
    } else {
        //ETWAS BERECHNEN
        $ausgabeText = "hallo TEXT";
        $smarty->assign('ausgabeText', htmlentities($ausgabeText));
    }
}

$smarty->display('index.tpl');
