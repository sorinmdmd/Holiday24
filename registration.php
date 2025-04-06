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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $csrf_token = $_POST['csrf_token'];

    // Werte ins Template geben, falls errorMessage auftreten
    $smarty->assign('firstName', htmlentities($firstName));
    $smarty->assign('lastName', htmlentities($lastName));
    $smarty->assign('email', htmlentities($email));

    // CSRF prüfen
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        $smarty->assign('errorMessage', 'Ungültiger CSRF-Token.');
    } else {
        // Eingabevalidierung
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $smarty->assign('errorMessage', 'Alle Felder sind erforderlich.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $smarty->assign('errorMessage', 'Ungültiges E-Mail-Format.');
        } elseif (DbFunctions::emailExists($link, $email)) {
            $smarty->assign('errorMessage', 'Diese E-Mail-Adresse ist bereits registriert.');
        } else {
            // Registrierung durchführen
            if (DbFunctions::registerUser($link, $firstName, $lastName, $email, $password)) {
                header("Location: login.php");
                exit();
            } else {
                $smarty->assign('errorMessage', 'errorMessage beim Registrieren des Nutzers.');
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