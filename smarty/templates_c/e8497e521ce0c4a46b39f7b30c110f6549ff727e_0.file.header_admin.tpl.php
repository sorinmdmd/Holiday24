<?php
/* Smarty version 4.2.0, created on 2025-04-12 11:44:26
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fa521a5b9b38_22136356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8497e521ce0c4a46b39f7b30c110f6549ff727e' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header_admin.tpl',
      1 => 1744443094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fa521a5b9b38_22136356 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header_admin.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
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
        <li class="home-li"><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'index') {?>active-link<?php }?>" href="index.php">Home</a></li>
            <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'customer') {?>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'mytravelpacks') {?>active-link<?php }?>" href="mytravelpacks.php">My Travel Packs</a></li>
        <?php } elseif ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'admin') {?>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'admin_panel') {?>active-link<?php }?>" href="admin_panel.php">Admin Panel</a></li>
        <?php }?>
        <li>
            <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value))) {?>
                <a class="accent-link" href="logout.php">Logout - <?php echo $_smarty_tpl->tpl_vars['user_role']->value;?>
</a>
            <?php } else { ?>
                <a class="accent-link" href="login.php">Login</a>
            <?php }?>
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
