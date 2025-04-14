<?php
/* Smarty version 4.2.0, created on 2025-04-13 16:57:38
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/adminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fbed02af3448_01789910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fded5bbe70a523484021f76284ffd58f39b7060a' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/adminPanel.tpl',
      1 => 1744563450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
  ),
),false)) {
function content_67fbed02af3448_01789910 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/admin-panel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="button-container">
        <a href="manageUsers.php" class="big-button">Manage Users</a>
        <a href="manageTravelPacks.php" class="big-button">Manage Travel Packs</a>
    </div>
</body>
</html>
<?php }
}
