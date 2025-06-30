<?php
/* Smarty version 4.2.0, created on 2025-06-30 17:47:40
  from '/var/www/html/iksy05/Holiday24_test/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6862cdbc504509_65023226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc39285ae120415eb9d768fafdff8fc555dd954a' => 
    array (
      0 => '/var/www/html/iksy05/Holiday24_test/smarty/templates/login.tpl',
      1 => 1751305657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6862cdbc504509_65023226 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</p>
        <?php }?>
        <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="POST">
            <input type="hidden" name="csrf_token" value="<?php if ((isset($_smarty_tpl->tpl_vars['csrf_token']->value))) {
echo $_smarty_tpl->tpl_vars['csrf_token']->value;
}?>">
            
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="<?php if ((isset($_smarty_tpl->tpl_vars['email']->value))) {
echo $_smarty_tpl->tpl_vars['email']->value;
}?>" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>" required><br>
            
            <button type="submit">Log In</button>
        </form>
        <div class="forgot-password">
            <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </div>
    </main>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
