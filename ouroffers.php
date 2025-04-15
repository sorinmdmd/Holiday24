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

    $months = DbAccess::getMonths($link);
    $smarty->assign('months', $months);

    // Standard: alle Travelbundles laden
    $travelbundles = DbAccess::getTravelbundles($link);

    // Standard: keine Fehlermeldung
    $no_results = false;

    // Wenn das Formular abgeschickt wurde, Filter anwenden
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $country = isset($_POST['i_country']) ? trim($_POST['i_country']) : null;
        $month = isset($_POST['month']) ? trim($_POST['month']) : null;
        $travelers = isset($_POST['number_travelers']) ? trim($_POST['number_travelers']) : null;

        $travelbundles = DbAccess::getFilteredTravelbundles($link, $country, $month, $travelers);

        if (empty($travelbundles)) {
            $no_results = true;
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
    $smarty->assign('activePage', 'ouroffers');

   // .tpl erst am Ende laden, um Fehler "unknown variable" zu vermeiden!
    $smarty->display('ouroffers.tpl');


?>