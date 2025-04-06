<?php
/* Smarty version 4.2.0, created on 2025-04-06 15:31:45
  from '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/admin_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f29e611c5ba3_65611785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb908871ea56adbdafa974060842e003997b8627' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/admin_panel.tpl',
      1 => 1743953410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67f29e611c5ba3_65611785 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
       
    </main>
</body>
</html>
<?php }
}
