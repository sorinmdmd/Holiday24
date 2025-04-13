<?php
/* Smarty version 4.2.0, created on 2025-04-13 10:01:59
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/adminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fb8b97bcbde8_24066117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcde584ea6b17b8b25b89ba0d49bfec1426e5631' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/adminPanel.tpl',
      1 => 1744538518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
  ),
),false)) {
function content_67fb8b97bcbde8_24066117 (Smarty_Internal_Template $_smarty_tpl) {
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
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            height: 80vh;
            flex-wrap: wrap;
        }

        .big-button {
            padding: 25px 50px;
            font-size: 22px;
            font-weight: bold;
            color: black;
            background: linear-gradient(145deg,rgb(255, 255, 255),rgb(255, 255, 255));
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
        }

        .big-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 123, 255, 0.3);
        }
    </style>
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
