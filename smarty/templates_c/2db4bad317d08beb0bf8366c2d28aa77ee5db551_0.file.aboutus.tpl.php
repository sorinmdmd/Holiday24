<?php
/* Smarty version 4.2.0, created on 2025-04-04 15:14:48
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/aboutus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67eff768b08ea7_24546022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2db4bad317d08beb0bf8366c2d28aa77ee5db551' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/aboutus.tpl',
      1 => 1743779651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67eff768b08ea7_24546022 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <!-- You could list the offers here -->
        <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
            <div class="offer">
                <h2><?php echo $_smarty_tpl->tpl_vars['offer']->value['title'];?>
</h2>
                <p><?php echo $_smarty_tpl->tpl_vars['offer']->value['description'];?>
</p>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
    </main>
</body>
</html>
<?php }
}
