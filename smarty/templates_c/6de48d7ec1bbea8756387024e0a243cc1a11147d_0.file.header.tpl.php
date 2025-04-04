<?php
/* Smarty version 4.2.0, created on 2025-04-04 14:31:36
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67efed48e34256_25600496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6de48d7ec1bbea8756387024e0a243cc1a11147d' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/header.tpl',
      1 => 1743777035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67efed48e34256_25600496 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="css/header.css">
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="Palm Tree Logo">
                <span class="site-name">Holiday24</span>
            </a>
        </div>
        <nav>
            <ul>
             <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'customer') {?>
                    <li><a href="mytravelpacks.php">My Travel Packs</a></li>
                <?php } elseif ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'admin') {?>
                    <li><a href="admin_panel.php">Admin Panel</a></li>
                <?php }?>
                <li><a href="angebote.php">Unsere Angebote</a></li>
                <li><a href="aboutus.php">Über uns</a></li>
               
                <li>
                    <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value))) {?>
                        <a href="logout.php">Logout (<?php echo $_smarty_tpl->tpl_vars['user_role']->value;?>
)</a>
                    <?php } else { ?>
                        <a href="login.php">Login</a>
                    <?php }?>
                </li>
                
            </ul>
        </nav>
    </div>
</header>
<?php }
}
