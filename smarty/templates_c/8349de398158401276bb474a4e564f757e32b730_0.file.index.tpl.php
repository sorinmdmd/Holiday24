<?php
/* Smarty version 4.2.0, created on 2025-04-04 14:36:57
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67efee890bfc53_48482272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8349de398158401276bb474a4e564f757e32b730' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/index.tpl',
      1 => 1743777392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67efee890bfc53_48482272 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Forms.css">
    <link rel="stylesheet" type="text/css" href="css/Tables.css">
        <link rel="icon" href="images/logo.png" type="image/png">

    <title>Holiday24</title>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>Welcome to Holiday24</h1>
    <p>This is a basic HTML template using Smarty.</p>

    <?php if (((isset($_smarty_tpl->tpl_vars['PHP_SELF']->value)))) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"/>
    
    <?php } else { ?>
        <?php if (((isset($_smarty_tpl->tpl_vars['fehler']->value)))) {?>
            Unzulässige Eingabe.
        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['ausgabeText']->value;?>

            <br />
        <?php }?>
    <?php }?>
</body>
</html><?php }
}
