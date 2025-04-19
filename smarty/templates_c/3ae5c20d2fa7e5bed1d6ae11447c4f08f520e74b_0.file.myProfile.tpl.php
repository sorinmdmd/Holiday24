<?php
/* Smarty version 4.2.0, created on 2025-04-18 09:33:59
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/myProfile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68021c877f36f1_71853234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ae5c20d2fa7e5bed1d6ae11447c4f08f520e74b' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/myProfile.tpl',
      1 => 1744968670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_68021c877f36f1_71853234 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/myProfile.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

        <!-- Display user information -->
        <div>
            <h2>User Information</h2>
            <p><strong>First Name:</strong> <?php echo $_smarty_tpl->tpl_vars['me']->value[0]['first_name'];?>
</p>
            <p><strong>Last Name:</strong> <?php echo $_smarty_tpl->tpl_vars['me']->value[0]['last_name'];?>
</p>
            <p><strong>Email:</strong> <?php echo $_smarty_tpl->tpl_vars['me']->value[0]['email'];?>
</p>
            <p><strong>Verified:</strong>
                <?php if ($_smarty_tpl->tpl_vars['me']->value[0]['verified'] == 1) {?>
                   ✅
                <?php } else { ?>
                    ❌
                    <form action="verificationPage.php" method="post" style="display:inline;">
                        <button type="submit">Verify Account</button>
                    </form>
                <?php }?>
            </p>
            <!-- Add more fields as needed -->
        </div>
    </main>
</body>
</html>
<?php }
}
