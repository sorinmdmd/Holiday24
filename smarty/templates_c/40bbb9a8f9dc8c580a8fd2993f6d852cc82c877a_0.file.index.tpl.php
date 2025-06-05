<?php
/* Smarty version 4.2.0, created on 2025-06-04 06:23:55
  from '/Users/dennismac/Documents/Projects/reisebüro24/Holiday24/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_683fe67b9fce14_85430027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40bbb9a8f9dc8c580a8fd2993f6d852cc82c877a' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/reisebüro24/Holiday24/smarty/templates/index.tpl',
      1 => 1749018078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:aboutUs.tpl' => 1,
  ),
),false)) {
function content_683fe67b9fce14_85430027 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/homepage.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <section class="home">
        <h1>Your Journey Starts Here✈️</h1>
        <img src="images/layer1.png" class="img layer1" alt="">
        <img src="images/layer2.png" class="img layer2" alt="">
        <img src="images/layer3.png" class="img layer3" alt="">
    </section>
    <?php if (((isset($_smarty_tpl->tpl_vars['PHP_SELF']->value)))) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"/>
    <div id="aboutusId">
        <?php $_smarty_tpl->_subTemplateRender("file:aboutUs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
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
