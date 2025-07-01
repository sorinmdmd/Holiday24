<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Reset password";
$smarty->assign('title', htmlentities($title));

// REMOVE or MOVE this session_destroy() from here:
// session_destroy(); // <--- This line is problematic here

$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF']);
$smarty->assign('PHP_SELF', $PHP_SELF);

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

// Keep these assignments if you want user_id and email available
// even on the reset password page before a reset attempt.
// However, given it's a *reset* page, these might not be relevant until a user logs in *after* resetting.
// If a user *is* logged in and trying to reset their *own* password, then these make sense.
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['email'])) {
    $smarty->assign('email', $_SESSION['email']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF-Prüfung
    if (
        !isset($_POST['csrf_token'], $_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        unset($_SESSION['csrf_token']);
        die("CSRF Token ungültig!");
    }

    // Passwort zurücksetzen nach Eingabe des Verifizierungscodes
    if (isset($_POST['password']) && isset($_POST['password2'])) {
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $email = $_SESSION['email'] ?? null; // Assuming email is set in session from a previous step (e.g., verification code entry)

        if (!$email) {
            $smarty->assign('errorMessage', 'Email not set.');
        } elseif (!Sicherheit::validatePassword($password)) {
            $smarty->assign('errorMessage', 'The password must contain at least one number, one uppercase character, one special character, and a length of at least 8 characters.');
        } elseif ($password !== $password2) {
            $smarty->assign('errorMessage', 'Passwords do not match.');
        } else {
            // Update pw
            if (DbFunctions::updatePassword($link, $email, $password)) {
                // ONLY destroy session AFTER successful password update and BEFORE redirect
                session_destroy();
                header("Location: login.php");
                exit();
            } else {
                $smarty->assign('errorMessage', 'Fehler beim Zurücksetzen des Passworts.');
            }
        }
    }

} else {
    // If GET: Generate CSRF Token (if not already present)
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
}

// Assign form values (so they persist on error)
// email should probably come from session for password reset flow, not $_POST
$smarty->assign('email', $_SESSION['email'] ?? ''); // Use session email if available
$smarty->assign('password', isset($_POST['password']) ? $_POST['password'] : '');
$smarty->assign('csrf_token', $_SESSION['csrf_token']);


// User-ID and user_role for logged-in users should be assigned *before* template display
// and only if the session is active (which it should be, as we moved session_destroy())
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}

// Ensure user_role is assigned to Smarty if it exists in the session
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
} else {
    // Optionally assign a default or null if user_role is not set
    $smarty->assign('user_role', null);
}


$smarty->assign('activePage', 'login'); // Or 'resetPassword' if you have a specific styling for it
$smarty->display('resetPassword.tpl');
?>