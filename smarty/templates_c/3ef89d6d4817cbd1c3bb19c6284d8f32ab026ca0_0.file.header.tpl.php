<?php
/* Smarty version 4.2.0, created on 2025-04-06 14:51:44
  from '/Applications/XAMPP/xamppfiles/htdocs/iksy2mainCopy/iksy2/smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f29500038081_96467773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ef89d6d4817cbd1c3bb19c6284d8f32ab026ca0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/iksy2mainCopy/iksy2/smarty/templates/header.tpl',
      1 => 1743888334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f29500038081_96467773 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/globalcss">
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
        <li><a class="accent-link" href="login.php">Login</a></li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<?php echo '<script'; ?>
 src="script.js" defer><?php echo '</script'; ?>
>
</header>
<?php }
}
