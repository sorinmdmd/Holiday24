<?php
/* Smarty version 4.2.0, created on 2025-05-28 09:59:10
  from 'C:\Users\Hugo\OneDrive\HS Bochum\SS25\IKSY II\Test_28_Mai\iksy2\smarty\templates\headerAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6836de6e65bdd6_90009927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14d099bc9bf67836922d80a65085c97a81d1631a' => 
    array (
      0 => 'C:\\Users\\Hugo\\OneDrive\\HS Bochum\\SS25\\IKSY II\\Test_28_Mai\\iksy2\\smarty\\templates\\headerAdmin.tpl',
      1 => 1748426269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6836de6e65bdd6_90009927 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/headerAdmin.css">
<header>
<button id="open-sidebar-button" onclick="openSidebar()">
    <img src="images/menu-button.svg" height="40px" width="40px" fill="#FFA725">
</button>  
<nav id="navbar">
    <ul>
        <li>
            <button id="close-sidebar-button" onclick="closeSidebar()">
                <img src="images/close-button.svg" height="40px" width="40px" fill="#FFA725">
            </button>
        </li>
        <li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'adminPanel') {?>active-link<?php }?>" href="adminPanel.php">ADMIN</a></li>
            <li><a href="adminPanel.php#userTable">Manage Users</a></li>
            <li><a href="adminPanel.php#travelManagement">Manage Travel</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ourOffers.php">Travelpacks</a></li> 
            <li><a class="accent-link" href="logout.php">Logout - <?php echo $_smarty_tpl->tpl_vars['user_role']->value;?>
</a></li>
        </li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<?php echo '<script'; ?>
 src="script.js" defer><?php echo '</script'; ?>
>
</header>
<?php }
}
