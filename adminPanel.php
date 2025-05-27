<?php
session_start();

require_once 'classes/includes/startTemplate.inc.php';
require_once 'classes/DbFunctions.inc.php';
require_once 'classes/Customer.inc.php';
require_once 'classes/Sicherheit.inc.php';
require_once 'classes/Travelpack.inc.php';

DEFINE('ENCODING', 'UTF-8');

$link = DbFunctions::connectWithDatabase();

$title = "Admin Panel";
$smarty->assign('title', htmlentities($title));

$users = Customer::getUserDetails($link);

$travelbundles = Travelpack::getTravelbundles($link);
$smarty->assign('travelbundles', $travelbundles);

if (isset($_SESSION['user_id'])) {
    $smarty->assign('user_id', $_SESSION['user_id']);
}
if (isset($_SESSION['user_role'])) {
    $smarty->assign('user_role', $_SESSION['user_role']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $userId = $_POST['delete_user_id']; 
    if ($userId != 0) {
        Customer::deleteUser($link, $userId);
    }
}
// Assign user_role to Smarty if the user is logged in
$smarty->assign('users', $users);
$smarty->assign('activePage', 'admin_panel');
$smarty->display('adminPanel.tpl');
?>