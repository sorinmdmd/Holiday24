<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/includes/DbFunctions.inc.php';
require_once 'classes/includes/Travel.inc.php';
require_once 'classes/includes/Sicherheit.inc.php';
require_once 'classes/includes/MailService.inc.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Verification Page";
$smarty->assign('title', htmlentities($title));

// User check
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$me = Customer::getUserById($link, $_SESSION['user_id']);
$userEmail = $me[0]['email'] ?? null;


// Generate or refresh code
$codeExpired = !isset($_SESSION['verification_code_time']) || (time() - $_SESSION['verification_code_time']) > 300;
if (!isset($_SESSION['verification_code']) || $codeExpired) {
    $_SESSION['verification_code'] = rand(100000, 999999);
    $_SESSION['verification_code_time'] = time();

    if ($userEmail) {
        $mailService = new MailService();
        $mailSent = $mailService->sendVerificationEmail($userEmail, $_SESSION['verification_code']);
        if (!$mailSent) {
            $smarty->assign('error', 'Verification email could not be sent1.');
        }
    } else {
        $smarty->assign('error', 'Email address not found.');
    }
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'verify') {
        $enteredCode = $_POST['verification_code'] ?? '';

        // Check if the entered code matches the session code
        if (isset($_SESSION['verification_code']) && $enteredCode == $_SESSION['verification_code']) {
            Customer::verifyUser($link, $_SESSION['user_id']);
            unset($_SESSION['verification_code'], $_SESSION['verification_code_time']);

            if ($_SESSION['isPwReset']) {

                header("Location: resetPassword.php");
                exit();

            } else {
                header("Location: myProfile.php");
                exit();
            }


        } else {
            // Set error only if the code is invalid
            $smarty->assign('error', "Invalid verification code.");
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'resend_email') {
        if ($userEmail) {
            $mailService = new MailService();
            $mailSent = $mailService->sendVerificationEmail($userEmail, $_SESSION['verification_code']);
            if (!$mailSent) {
                $smarty->assign('error', 'Verification email could not be sent2.');
            } else {
                $smarty->assign('message', 'Verification email has been resent.');
            }
        } else {
            $smarty->assign('error', 'Email address not found.');
        }
    }
} else {
    // Wenn GET: CSRF Token generieren (falls noch nicht vorhanden)
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
}
$smarty->assign('activePage', 'verificationPage');
$smarty->display('verificationPage.tpl');
?>