<?php
session_start();

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Login";
$smarty->assign('ueberschrift', htmlentities($ueberschrift));

$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF']);
$smarty->assign('PHP_SELF', $PHP_SELF);

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

if ($REQUEST_METHOD == "POST") {
    // Verify CSRF token
    if (!isset($_POST["csrf_token"]) || !isset($_SESSION["csrf_token"]) || !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        unset($_SESSION["csrf_token"]);
        die("CSRF Token ungültig!");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = DbFunctions::verifyUser($link, $email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['CustomerID'];
        $_SESSION['user_role'] = $user['role'];
        header("Location: index.php"); // Redirect to a dashboard or home page
        exit();
    } else {
        $smarty->assign('fehler', "Ungültige E-Mail oder Passwort.");
    }

    // Regenerate CSRF token after form submission
    $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
} else {
    // Generate CSRF token if not set
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
}

// Ensure email and password are assigned even if not set
$smarty->assign('email', isset($_POST['email']) ? $_POST['email'] : '');
$smarty->assign('password', isset($_POST['password']) ? $_POST['password'] : '');

$smarty->display('login.tpl');
?>
