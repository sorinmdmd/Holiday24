<?php
/* Smarty version 4.2.0, created on 2025-04-18 11:35:12
  from 'C:\Users\Hugo\OneDrive\HS Bochum\SS25\IKSY II\git\iksy2\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_680238f0d8e804_99783437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9e443790a84bb98d35ef3bd74f418181b2cdde2' => 
    array (
      0 => 'C:\\Users\\Hugo\\OneDrive\\HS Bochum\\SS25\\IKSY II\\git\\iksy2\\smarty\\templates\\login.tpl',
      1 => 1744975989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_680238f0d8e804_99783437 (Smarty_Internal_Template $_smarty_tpl) {
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

            <div class="forgot-password">
                <a href="passwort_vergessen.php">Forgot password?</a>
            </div>
        </form>
        <div class="forgot-password">
            <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </div>
    </main>
</body>
</html><?php }
}
