<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Customer.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Login";
$smarty->assign('title', htmlentities($title));

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

    $user = Customer::verifyUserLogin($link, $email, $password);
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $smarty->assign('user_id', $user['id']); // Assign user_id to Smarty
        if($user['role'] == 'admin') {
            header("Location: adminPanel.php");
        } else header("Location: index.php"); // Redirect to a dashboard or home page
        exit();
    } else {
        $smarty->assign('fehler', "Invalid email or password.");
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

$smarty->assign('email', isset($_POST['email']) ? $_POST['email'] : '');
$smarty->assign('password', isset($_POST['password']) ? $_POST['password'] : '');

// Assign user_id to Smarty if the user is already logged in
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
$smarty->assign('activePage', 'login');
$smarty->display('login.tpl');
?>
