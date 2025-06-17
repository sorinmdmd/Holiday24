<?php
/* Smarty version 4.2.0, created on 2025-06-17 21:12:37
  from '/var/www/html/iksy05/Git/Holiday24/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6851da45b6ddb9_80346086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '695e6d3284a30688f8df5dca261992f546b0cdb7' => 
    array (
      0 => '/var/www/html/iksy05/Git/Holiday24/smarty/templates/index.tpl',
      1 => 1750194754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:aboutUs.tpl' => 1,
  ),
),false)) {
function content_6851da45b6ddb9_80346086 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/homepage.css">

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section class="home">
        <h1>Your Journey Starts Here✈️</h1>
        <img src="images/layer1.png" class="layer1" alt="Layered background" style="
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures it covers the area, cropping as needed */
        object-position: center; /* Centers the image content */
        display: block; /* Removes any default inline spacing issues */
    ">
    </section>

    <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" />
        <div id="aboutusId">
            <?php $_smarty_tpl->_subTemplateRender("file:aboutUs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </form>

    <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
        <p class="error">Unzulässige Eingabe.</p>
    <?php } elseif ((isset($_smarty_tpl->tpl_vars['ausgabeText']->value))) {?>
        <p class="success"><?php echo $_smarty_tpl->tpl_vars['ausgabeText']->value;?>
</p>
    <?php }?>
</body>

</html><?php }
}
