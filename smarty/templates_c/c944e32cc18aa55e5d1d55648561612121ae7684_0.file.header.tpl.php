<?php
/* Smarty version 4.2.0, created on 2025-04-15 10:23:52
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fe33b8555c95_01398760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c944e32cc18aa55e5d1d55648561612121ae7684' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header.tpl',
      1 => 1744712629,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fe33b8555c95_01398760 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header.css">
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
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'myProfile') {?>active-link<?php }?>" href="myProfile.php">My Profile</a></li>
        <?php }?>
        <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ouroffers.php">Our trips</a></li>
        <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'aboutus') {?>active-link<?php }?>" href="index.php #aboutusId">About us</a></li>
        <li>
            <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value))) {?>
                <a class="accent-link" href="logout.php">Logout</a>
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
