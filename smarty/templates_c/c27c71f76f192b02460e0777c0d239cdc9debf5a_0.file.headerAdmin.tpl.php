<?php
/* Smarty version 4.2.0, created on 2025-06-03 09:00:18
  from '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/headerAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_683eb9a28f7459_33389457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c27c71f76f192b02460e0777c0d239cdc9debf5a' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/headerAdmin.tpl',
      1 => 1748940002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683eb9a28f7459_33389457 (Smarty_Internal_Template $_smarty_tpl) {
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
