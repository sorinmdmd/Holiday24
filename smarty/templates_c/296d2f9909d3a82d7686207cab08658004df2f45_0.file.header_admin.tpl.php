<?php
/* Smarty version 4.2.0, created on 2025-04-14 18:15:33
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fd50c544f444_14988304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '296d2f9909d3a82d7686207cab08658004df2f45' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header_admin.tpl',
      1 => 1744654531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fd50c544f444_14988304 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header_admin.css">
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
             <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'adminPanel') {?>active-link<?php }?>" href="admin_panel.php">ADMIN</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'manageUsers') {?>active-link<?php }?>" href="manageUsers.php">Manage Users</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == '#') {?>active-link<?php }?>" href="#">Manage Travel</a></li>
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
