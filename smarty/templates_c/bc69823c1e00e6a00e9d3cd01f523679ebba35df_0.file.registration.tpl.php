<?php
/* Smarty version 4.2.0, created on 2025-06-30 17:40:03
  from '/var/www/html/iksy05/Holiday24_test/smarty/templates/registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6862cbf3a3edb0_86496329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc69823c1e00e6a00e9d3cd01f523679ebba35df' => 
    array (
      0 => '/var/www/html/iksy05/Holiday24_test/smarty/templates/registration.tpl',
      1 => 1751303970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_6862cbf3a3edb0_86496329 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/registration.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
          <form method="post" action="registration.php">
            <input type="hidden" name="csrf_token" value="<?php if ((isset($_smarty_tpl->tpl_vars['csrf_token']->value))) {
echo $_smarty_tpl->tpl_vars['csrf_token']->value;
}?>">

            <label for="firstName">First Name:</label>
            <input type="firstName" id="firstName" name="firstName" value="<?php if ((isset($_smarty_tpl->tpl_vars['firstName']->value))) {
echo $_smarty_tpl->tpl_vars['firstName']->value;
}?>" required><br>

            <label for="lastName">Last Name:</label>
            <input type="lastName" id="lastName" name="lastName" value="<?php if ((isset($_smarty_tpl->tpl_vars['lastName']->value))) {
echo $_smarty_tpl->tpl_vars['lastName']->value;
}?>" required><br>
            
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="<?php if ((isset($_smarty_tpl->tpl_vars['email']->value))) {
echo $_smarty_tpl->tpl_vars['email']->value;
}?>" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>" required><br>

            <label for="password2">Verify Password:</label>
            <input type="password" id="password" name="password2" value="<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>" required><br>
            
            <button type="submit">Register</button>

            <div class="acount-made-question">
                <p>Already have an account? <a href="login.php">Log in here</a></p>
            </div>
        </form>
        <?php if ((isset($_smarty_tpl->tpl_vars['errorMessage']->value))) {?>
            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</p>
        <?php }?>
    </main>
</body>
</html>
<?php }
}
