<?php
/* Smarty version 4.2.0, created on 2025-04-13 09:57:14
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/admin_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fb8a7ae318b9_71387670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb106560790f6e3acab3bd648cc5be22bd6ddec6' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/admin_panel.tpl',
      1 => 1744538219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
  ),
),false)) {
function content_67fb8a7ae318b9_71387670 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        .big-button {
            display: inline-block;
            padding: 20px 40px;
            font-size: 20px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .big-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <a href="manageUsers.php" class="big-button">Manage Users</a>
    <a href="manageTravelPacks.php" class="big-button">Manage Travel Packs</a>
</body>
</html>
<?php }
}
