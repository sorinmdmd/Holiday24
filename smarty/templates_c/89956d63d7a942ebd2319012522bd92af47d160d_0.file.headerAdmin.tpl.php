<?php
/* Smarty version 4.2.0, created on 2025-06-04 06:25:53
  from '/Users/dennismac/Documents/Projects/reisebüro24/Holiday24/smarty/templates/headerAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_683fe6f1c4bac0_76501613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89956d63d7a942ebd2319012522bd92af47d160d' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/reisebüro24/Holiday24/smarty/templates/headerAdmin.tpl',
      1 => 1749018078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683fe6f1c4bac0_76501613 (Smarty_Internal_Template $_smarty_tpl) {
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
