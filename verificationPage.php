<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/DbAccess.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/MailService.inc.php';
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

$me = DbAccess::getUserById($link, $_SESSION['user_id']);
$userEmail = $me[0]['email'] ?? null;

$smarty->assign('user_id', $_SESSION['user_id']);
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}

// Generate or refresh code
$codeExpired = !isset($_SESSION['verification_code_time']) || (time() - $_SESSION['verification_code_time']) > 300;
if (!isset($_SESSION['verification_code']) || $codeExpired) {
    $_SESSION['verification_code'] = rand(100000, 999999);
    $_SESSION['verification_code_time'] = time();

    if ($userEmail) {
        $mailService = new MailService();
        $mailSent = $mailService->sendVerificationEmail($userEmail, $_SESSION['verification_code']);
        if (!$mailSent) {
            $smarty->assign('error', 'Verification email could not be sent.');
        }
    } else {
        $smarty->assign('error', 'Email address not found.');
    }
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredCode = $_POST['verification_code'] ?? '';

    if (isset($_SESSION['verification_code']) && $enteredCode == $_SESSION['verification_code']) {
        DbAccess::verifyUser($link, $_SESSION['user_id']);
        unset($_SESSION['verification_code'], $_SESSION['verification_code_time']);
        header("Location: myProfile.php");
        exit();
    } else {
        $smarty->assign('error', "Invalid verification code.");
    }
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'verify') {
        $enteredCode = $_POST['verification_code'] ?? '';

        if (isset($_SESSION['verification_code']) && $enteredCode == $_SESSION['verification_code']) {
            DbAccess::verifyUser($link, $_SESSION['user_id']);
            unset($_SESSION['verification_code'], $_SESSION['verification_code_time']);
            header("Location: myProfile.php");
            exit();
        } else {
            $smarty->assign('error', "Invalid verification code.");
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'resend_email') {
        if ($userEmail) {
            $mailService = new MailService();
            $mailSent = $mailService->sendVerificationEmail($userEmail, $_SESSION['verification_code']);
            if (!$mailSent) {
                $smarty->assign('error', 'Verification email could not be sent.');
            } else {
                $smarty->assign('message', 'Verification email has been resent.');
            }
        } else {
            $smarty->assign('error', 'Email address not found.');
        }
    }
}


$smarty->assign('activePage', 'verificationPage');
$smarty->display('verificationPage.tpl');
