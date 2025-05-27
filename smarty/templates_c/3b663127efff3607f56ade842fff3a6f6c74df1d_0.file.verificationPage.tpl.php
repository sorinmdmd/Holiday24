<?php
/* Smarty version 4.2.0, created on 2025-05-27 15:54:42
  from 'C:\Users\Hugo\OneDrive\HS Bochum\SS25\IKSY II\test 27 Mai\iksy2\smarty\templates\verificationPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6835e042a2c9d9_32718576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b663127efff3607f56ade842fff3a6f6c74df1d' => 
    array (
      0 => 'C:\\Users\\Hugo\\OneDrive\\HS Bochum\\SS25\\IKSY II\\test 27 Mai\\iksy2\\smarty\\templates\\verificationPage.tpl',
      1 => 1748358359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_6835e042a2c9d9_32718576 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/verification.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

        <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <?php }?>
        
        <form method="post" action="verificationPage.php">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit" name="action" value="verify">Verify</button>
        </form>
        
        <form method="post" action="verificationPage.php">
            <button type="submit" name="action" value="resend_email">Resend Verification Email</button>
        </form>
    </main>
</body>
</html>
<?php }
}
