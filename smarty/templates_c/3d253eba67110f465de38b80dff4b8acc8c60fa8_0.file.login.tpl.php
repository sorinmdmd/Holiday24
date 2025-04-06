<?php
/* Smarty version 4.2.0, created on 2025-04-06 10:43:47
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f25ae3eb5135_79307738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d253eba67110f465de38b80dff4b8acc8c60fa8' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/login.tpl',
      1 => 1743936203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67f25ae3eb5135_79307738 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
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
</html>
<?php }
}
