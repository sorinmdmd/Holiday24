<?php
/* Smarty version 4.2.0, created on 2025-04-06 15:31:47
  from '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/angebote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f29e633bb3d0_83224299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff3a688ef11a50ca937f2237abca42483a5e604d' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/angebote.tpl',
      1 => 1743953415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67f29e633bb3d0_83224299 (Smarty_Internal_Template $_smarty_tpl) {
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
        <!-- Hier könntest du die Angebote auflisten -->
        <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['angebote']->value, 'angebot');
$_smarty_tpl->tpl_vars['angebot']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['angebot']->value) {
$_smarty_tpl->tpl_vars['angebot']->do_else = false;
?>
            <div class="angebot">
                <h2><?php echo $_smarty_tpl->tpl_vars['angebot']->value['titel'];?>
</h2>
                <p><?php echo $_smarty_tpl->tpl_vars['angebot']->value['beschreibung'];?>
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
