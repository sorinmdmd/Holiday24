<?php
/* Smarty version 4.2.0, created on 2025-06-30 13:32:13
  from 'D:\D_Uni\6. Semester\IKSY2\IKSY2_Projekt\Erstaz\Holiday24\smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686291dd4ba9f6_60683821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ecc94d8f6770bb71824c1d7df6d7cc151850d73' => 
    array (
      0 => 'D:\\D_Uni\\6. Semester\\IKSY2\\IKSY2_Projekt\\Erstaz\\Holiday24\\smarty\\templates\\index.tpl',
      1 => 1751290137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:aboutUs.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686291dd4ba9f6_60683821 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link rel="icon" href="/images/logo.png" type="image/png">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- Einzelne Bilder, die übereinander dargestellt werden -->
    <section class="home">
        <img src="images/layer1.png" class="img layer1" alt="Layer 1">
        <img src="images/layer2.png" class="img layer2" alt="Layer 2">
        <img src="images/layer3.png" class="img layer3" alt="Layer 3">
        <h1>Your Journey Starts Here ✈️</h1>
    </section>

    <!-- Einbindung der aboutUs.tpl in index und CSRF Schutz -->
    <?php if ((isset($_smarty_tpl->tpl_vars['PHP_SELF']->value))) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
        <div id="aboutusId">
            <?php $_smarty_tpl->_subTemplateRender("file:aboutUs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </form>
    <?php } elseif ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
        <p>Unzulässige Eingabe.</p>
    <?php } else { ?>
        <p><?php echo $_smarty_tpl->tpl_vars['ausgabeText']->value;?>
</p>
    <?php }?>
</body>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</html>
<?php }
}
