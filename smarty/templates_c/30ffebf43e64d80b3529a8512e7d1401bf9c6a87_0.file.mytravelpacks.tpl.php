<?php
/* Smarty version 4.2.0, created on 2025-04-04 15:23:13
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/mytravelpacks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67eff961a9e2e2_35673214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30ffebf43e64d80b3529a8512e7d1401bf9c6a87' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/mytravelpacks.tpl',
      1 => 1743780171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67eff961a9e2e2_35673214 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
