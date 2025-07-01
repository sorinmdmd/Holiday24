<?php
/* Smarty version 4.2.0, created on 2025-06-30 13:32:13
  from 'D:\D_Uni\6. Semester\IKSY2\IKSY2_Projekt\Erstaz\Holiday24\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686291dd7d0e42_62331357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5115a541d9d9f02861b78606c3c71bb2280ced1d' => 
    array (
      0 => 'D:\\D_Uni\\6. Semester\\IKSY2\\IKSY2_Projekt\\Erstaz\\Holiday24\\smarty\\templates\\header.tpl',
      1 => 1751290137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686291dd7d0e42_62331357 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<header>
<button id="open-sidebar-button" onclick="openSidebar()">
    <img src="images/menu-button.svg" height="40px" width="40px" fill="#FFA725">
</button>  
<!--Navigationsbar. Wird auf jeder Seite eingebunden, um die Navigation zu ermöglichen. 
IF-Bedingungen werden genutzt, um die aktive Seite zu markieren.-->
<nav id="navbar">
    <ul>
        <li>
            <button id="close-sidebar-button" onclick="closeSidebar()">
                <img src="images/close-button.svg" height="40px" width="40px" fill="#FFA725">
            </button>
        </li>
        <li class="home-li"><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'index') {?>active-link<?php }?>" href="index.php">Home</a></li>
        <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'customer') {?>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'mytravelpacks') {?>active-link<?php }?>" href="myTravelPacks.php">My Travel Packs</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'myProfile') {?>active-link<?php }?>" href="myProfile.php">My Profile</a></li>
        <?php }?>
        <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ourOffers.php">Our trips</a></li>
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
<!--Funktion zum schließen der Navbar (nur wenn Fenster <800px)  -->
<div id="overlay" onclick="closeSidebar()"></div>      
<?php echo '<script'; ?>
 src="script.js" defer><?php echo '</script'; ?>
>
</header>
<?php }
}
