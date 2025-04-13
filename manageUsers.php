<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/DbAccess.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "Manage Users";
$smarty->assign('title', htmlentities($title));
$users = DbAccess::getUserDetails($link);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $userId = $_POST['delete_user_id']; 
    if ($userId != 0) {
        DbFunctions::deleteUser($link, $userId);
    }
}

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
// Assign user_role to Smarty if the user is logged in
$smarty->assign('users', $users);
$smarty->assign('activePage', 'manageUsers');
$smarty->display('manageUsers.tpl');
?>