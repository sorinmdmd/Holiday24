<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';


DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Reset password";
$smarty->assign('title', htmlentities($title));

$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF']);
$smarty->assign('PHP_SELF', $PHP_SELF);

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];


if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['email'])) {
    $smarty->assign('email', $_SESSION['email']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    // CSRF-Prüfung
    if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || 
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        unset($_SESSION['csrf_token']);
        die("CSRF Token ungültig!");
    }

    // Passwort zurücksetzen nach Eingabe des Verifizierungscodes
    if (isset($_POST['password']) && isset($_POST['password2'])) {
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $email = $_SESSION['email'] ?? null;

        if (!$email) {
            $smarty->assign('errorMessage', 'Email not set.');
        } elseif (!Sicherheit::validatePassword($password)) {
            $smarty->assign('errorMessage', 'The password must contain at least one number, one uppercase character, one special character, and a length of at least 8 characters.');
        } elseif ($password !== $password2) {
            $smarty->assign('errorMessage', 'Passwords do not match.');
        } else {
            // Update pw
            if (DbFunctions::updatePassword($link, $email, $password)) { 
               // $_SESSION['successMessage'] = 'Password successfully reset. You can now log in.';
                
                session_destroy();
                header("Location: login.php");
                exit();
                
            } else {
                $smarty->assign('errorMessage', 'Fehler beim Zurücksetzen des Passworts.');
            }
        }
    }

}else {
    // Wenn GET: CSRF Token generieren (falls noch nicht vorhanden)
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
}

// Form-Werte zuweisen (damit sie bei Fehlern erhalten bleiben)
$smarty->assign('email', isset($_POST['email']) ? $_POST['email'] : '');
$smarty->assign('password', isset($_POST['password']) ? $_POST['password'] : '');
$smarty->assign('csrf_token', $_SESSION['csrf_token']);

// User-ID für eingeloggte User setzen
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}

$smarty->assign('activePage', 'login');
$smarty->display('resetPassword.tpl');
?>
