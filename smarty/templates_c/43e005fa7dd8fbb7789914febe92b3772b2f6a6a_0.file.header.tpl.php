<?php
/* Smarty version 4.2.0, created on 2025-04-19 11:10:48
  from 'C:\Users\Acer\OneDrive\HS Bochum\SS25\IKSY II\git\iksy2\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_680384b8781c13_35682101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43e005fa7dd8fbb7789914febe92b3772b2f6a6a' => 
    array (
      0 => 'C:\\Users\\Acer\\OneDrive\\HS Bochum\\SS25\\IKSY II\\git\\iksy2\\smarty\\templates\\header.tpl',
      1 => 1745060719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680384b8781c13_35682101 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'mytravelpacks') {?>active-link<?php }?>" href="myTravelpacks.php">My Travel Packs</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'myProfile') {?>active-link<?php }?>" href="myProfile.php">My Profile</a></li>
        <?php }?>
        <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ouroffers.php">Our trips</a></li>
        <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'aboutus') {?>active-link<?php }?>" href="index.php#aboutusId">About us</a></li>
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
