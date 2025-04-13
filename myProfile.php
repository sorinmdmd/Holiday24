<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/DbAccess.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();
$title = "My Profile";
$smarty->assign('title', htmlentities($title));
$me = DbAccess::getUserById($link, $_SESSION['user_id']);
echo $_SESSION['user_id'];

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
// Assign user_role to Smarty if the user is logged in
$smarty->assign('me', $me);
$smarty->assign('activePage', 'myProfile');
$smarty->display('myProfile.tpl');
?>