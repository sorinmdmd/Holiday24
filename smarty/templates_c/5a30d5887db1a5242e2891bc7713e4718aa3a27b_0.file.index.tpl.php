<?php
/* Smarty version 4.2.0, created on 2025-04-03 20:17:04
  from '/var/www/html/iksy05/IKSY2/Git/iksy2/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67eeecc0787d62_72083816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a30d5887db1a5242e2891bc7713e4718aa3a27b' => 
    array (
      0 => '/var/www/html/iksy05/IKSY2/Git/iksy2/smarty/templates/index.tpl',
      1 => 1743710467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67eeecc0787d62_72083816 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Forms.css">
    <link rel="stylesheet" type="text/css" href="css/Tables.css">
    <title>Sample Project</title>
</head>
<body>
    <h1>Welcome to Sample Project</h1>
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
