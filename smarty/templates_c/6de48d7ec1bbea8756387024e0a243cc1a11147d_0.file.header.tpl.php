<?php
/* Smarty version 4.2.0, created on 2025-04-06 21:23:17
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f2f0c508a828_44043046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6de48d7ec1bbea8756387024e0a243cc1a11147d' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header.tpl',
      1 => 1743974594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f2f0c508a828_44043046 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="icon" href="images/logo.png" type="image/png">
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
        <li class="home-li"><a class="active-link" href="index.php">Home</a></li>
        <li><a href="angebote.php">Our trips</a></li>
        <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'customer') {?>
            <li><a href="mytravelpacks.php">My Travel Packs</a></li>
        <?php } elseif ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'admin') {?>
            <li><a href="admin_panel.php">Admin Panel</a></li>
        <?php }?>
        <li><a href="aboutus.php">About us</a></li>
        <li>
            <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value))) {?>
                <a class="accent-link" href="logout.php">Logout (<?php echo $_smarty_tpl->tpl_vars['user_role']->value;?>
)</a>
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
