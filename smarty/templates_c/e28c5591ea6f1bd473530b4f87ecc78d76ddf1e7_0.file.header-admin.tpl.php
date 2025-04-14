<?php
/* Smarty version 4.2.0, created on 2025-04-14 18:48:57
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fd58995d2005_83339201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e28c5591ea6f1bd473530b4f87ecc78d76ddf1e7' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/header-admin.tpl',
      1 => 1744656535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fd58995d2005_83339201 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header_admin.css">
<header>
<nav id="navbar">
    <ul>
        <li>
            <li><a href="admin_panel.php">ADMIN</a></li>
            <li><a href="#section-one">Manage Users</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == '#') {?>active-link<?php }?>" href="#">Manage Travel</a></li>
            <li><a class="<?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'ouroffers') {?>active-link<?php }?>" href="ouroffers.php">Travelpacks</a></li> 
            <li><a class="accent-link" href="logout.php">Logout - <?php echo $_smarty_tpl->tpl_vars['user_role']->value;?>
</a></li>
        </li>
    </ul>
</nav>
</header>
<?php }
}
