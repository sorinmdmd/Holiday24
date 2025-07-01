<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';


DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Forgot password";
$smarty->assign('title', htmlentities($title));

$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF']);
$smarty->assign('PHP_SELF', $PHP_SELF);

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

if ($REQUEST_METHOD == "POST") {

    // Wird die E-Mail per fetch() geprüft?
    if (isset($_POST['email']) && empty($_POST['login']) && empty($_POST['code'])) {
        if (DbFunctions::emailExists($link, $_POST['email'])) {

            $user_email = $_POST['email'];
            $_SESSION['isPwReset'] = true;
            $_SESSION['email'] = $user_email;
            $_SESSION['user_id'] = DbFunctions::getUserIDbyEmail($link, $user_email);

            echo 'email_exists';
            header("Location: verificationPage.php");
            exit();
        } else {
            echo 'email_not_found';
        }
        exit();
    }

    // Verify CSRF token
    if (!isset($_POST["csrf_token"]) || !isset($_SESSION["csrf_token"]) || !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        unset($_SESSION["csrf_token"]);
        die("CSRF Token ungültig!");
    }




    // Wenn Button "Login" geklickt wurde
    if (isset($_POST['login'])) {
        $user = DbFunctions::verifyUser($link, $email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $smarty->assign('user_id', $user['id']);
            header("Location: index.php");
            exit();
        } else {
            $smarty->assign('error-message', "Invalid email or password.");
        }
    }

    // Nach jedem POST neuen CSRF Token generieren
    $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
} else {
    // Wenn GET: CSRF Token generieren (falls noch nicht vorhanden)
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
}

// Form-Werte zuweisen (damit sie bei Fehlern erhalten bleiben)
$smarty->assign('email', isset($_POST['email']) ? $_POST['email'] : '');
$smarty->assign('password', isset($_POST['password']) ? $_POST['password'] : '');

// User-ID für eingeloggte User setzen
if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}

$smarty->assign('activePage', 'login');
$smarty->display('forgotPassword.tpl');
?>
