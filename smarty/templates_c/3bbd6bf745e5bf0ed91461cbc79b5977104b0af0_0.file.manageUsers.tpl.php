<?php
/* Smarty version 4.2.0, created on 2025-04-13 10:08:02
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/manageUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67fb8d02b01ef1_61501481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bbd6bf745e5bf0ed91461cbc79b5977104b0af0' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/manageUsers.tpl',
      1 => 1744538879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
  ),
),false)) {
function content_67fb8d02b01ef1_61501481 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/manageUsers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>User Management</h1>
    <div class="benutzerTabelle">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First and Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['id'] == 0) {?>
                            <?php } else { ?>
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                    <button type="submit">Delete</button>
                                </form>
                            <?php }?>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php }
}
