<?php
/* Smarty version 4.2.0, created on 2025-07-02 19:02:14
  from '/var/www/html/iksy05/Git/Holiday24/smarty/templates/resetPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68658236c44399_23390285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7acf992e25736ecb802981f7043169ded5b85624' => 
    array (
      0 => '/var/www/html/iksy05/Git/Holiday24/smarty/templates/resetPassword.tpl',
      1 => 1751482197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_68658236c44399_23390285 (Smarty_Internal_Template $_smarty_tpl) {
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
