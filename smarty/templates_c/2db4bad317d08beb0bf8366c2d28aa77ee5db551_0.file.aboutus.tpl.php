<?php
/* Smarty version 4.2.0, created on 2025-04-04 14:37:00
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/aboutus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67efee8c5fe513_26125784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2db4bad317d08beb0bf8366c2d28aa77ee5db551' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/aboutus.tpl',
      1 => 1743777414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67efee8c5fe513_26125784 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['ueberschrift']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="icon" href="images/logo.png" type="image/png">

</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['ueberschrift']->value;?>
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
