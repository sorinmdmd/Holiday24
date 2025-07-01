<?php
/* Smarty version 4.2.0, created on 2025-07-01 10:45:25
  from '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/resetPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6863bc45538c53_96646259',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '880b54ac4fa8bf1a7d8ff9aed1869c83c301041e' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/resetPassword.tpl',
      1 => 1751366577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_6863bc45538c53_96646259 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
    <img id="verified" src="images/verified.png" width="100" height="100" />
    
   
    <div id="error-message" style="color: red;">
    <?php if ((isset($_smarty_tpl->tpl_vars['errorMessage']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>

    <?php }?>
    </div>

    
    <form action="resetPassword.php" method="POST" id="newPassword">

        <input type="hidden" name="csrf_token" value="<?php if ((isset($_smarty_tpl->tpl_vars['csrf_token']->value))) {
echo $_smarty_tpl->tpl_vars['csrf_token']->value;
}?>">
            
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" value="<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>" required><br>

        <label for="password2">Verify new Password:</label>
        <input type="password" id="password2" name="password2" value="<?php if ((isset($_smarty_tpl->tpl_vars['password2']->value))) {
echo $_smarty_tpl->tpl_vars['password2']->value;
}?>" required><br>

        <button type="submit">Reset password</button>
    </form>


 
       
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
