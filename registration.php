<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Make an Account";
$smarty->assign('title', htmlentities($title));

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $csrf_token = $_POST['csrf_token'];

    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        $smarty->assign('fehler', 'Invalid CSRF token.');
    } else {
        // Validate and sanitize input
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $smarty->assign('fehler', 'All fields are required.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $smarty->assign('fehler', 'Invalid email format.');
        } else {
            // Register the user
            if (DbFunctions::registerUser($link, $firstName, $lastName, $email, $password)) {
                header("Location: login.php");
                exit();
            } else {
                $smarty->assign('fehler', 'Error registering user.');
            }
        }
    }
}

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$smarty->assign('csrf_token', $_SESSION['csrf_token']);

$smarty->display('registration.tpl');
?>
