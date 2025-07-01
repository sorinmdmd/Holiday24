<?php
/* Smarty version 4.2.0, created on 2025-07-01 09:24:18
  from '/var/www/html/iksy05/Holiday24/smarty/templates/headerAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6863a94226f377_33917436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e12c26ef021a63c06d27da4893b92c867fcc436e' => 
    array (
      0 => '/var/www/html/iksy05/Holiday24/smarty/templates/headerAdmin.tpl',
      1 => 1751361812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6863a94226f377_33917436 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/headerAdmin.css">
<header>
<button id="open-sidebar-button" onclick="openSidebar()">
    <img src="images/menu-button.svg" height="40px" width="40px" fill="#FFA725">
</button>  
<!-- Navigationsbar für das Adminpanel. Funktionen gleich zum normalen Navbar. -->
<nav id="navbar">
    <ul>
        <li>
            <button id="close-sidebar-button" onclick="closeSidebar()">
                <img src="images/close-button.svg" height="40px" width="40px" fill="#FFA725">
            </button>
        </li>
        <li>
        <li><a class="<?php if ((isset($_smarty_tpl->tpl_vars['activePage']->value)) && $_smarty_tpl->tpl_vars['activePage']->value == 'adminPanel') {?>active-link<?php }?>" href="adminPanel.php">ADMIN</a></li>
        <li><a href="adminPanel.php#userTable">Manage Users</a></li>
        <li><a href="adminPanel.php#travelManagement">Manage Travel</a></li>
        <li><a class="<?php if ((isset($_smarty_tpl->tpl_vars['activePage']->value)) && $_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ourOffers.php">Travelpacks</a></li>
        <li><a class="accent-link" href="logout.php">Logout<?php if ((isset($_smarty_tpl->tpl_vars['user_role']->value))) {?> - <?php echo $_smarty_tpl->tpl_vars['user_role']->value;
}?></a></li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<?php echo '<script'; ?>
 src="script.js" defer><?php echo '</script'; ?>
>
</header>
<?php }
}
