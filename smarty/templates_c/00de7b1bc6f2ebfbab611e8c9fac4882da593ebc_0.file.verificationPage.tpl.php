<?php
/* Smarty version 4.2.0, created on 2025-07-02 19:01:17
  from '/var/www/html/iksy05/Git/Holiday24/smarty/templates/verificationPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686581fdb351c5_00065155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00de7b1bc6f2ebfbab611e8c9fac4882da593ebc' => 
    array (
      0 => '/var/www/html/iksy05/Git/Holiday24/smarty/templates/verificationPage.tpl',
      1 => 1751482197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686581fdb351c5_00065155 (Smarty_Internal_Template $_smarty_tpl) {
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
            <input type="hidden" name="csrf_token" value="<?php if ((isset($_smarty_tpl->tpl_vars['csrf_token']->value))) {
echo $_smarty_tpl->tpl_vars['csrf_token']->value;
}?>">
                
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit" name="action" value="verify">Verify</button>
        </form>
        
        <form method="post" action="verificationPage.php">
            <button type="submit" name="action" value="resend_email">Resend Verification Email</button>
        </form>
    </main>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
