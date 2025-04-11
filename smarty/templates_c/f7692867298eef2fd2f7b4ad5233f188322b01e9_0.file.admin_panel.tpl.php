<?php
/* Smarty version 4.2.0, created on 2025-04-11 19:57:23
  from '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/admin_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f97423df5aa1_34368830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7692867298eef2fd2f7b4ad5233f188322b01e9' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainRep/iksy2/smarty/templates/admin_panel.tpl',
      1 => 1744401400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
  ),
),false)) {
function content_67f97423df5aa1_34368830 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>Benutzerverwaltung</h1>
    <div class="benutzerTabelle">
        <a href="">Neuen Benutzer hinzufügen</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aktionen</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];
echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['id'] == 0) {?>
                                <p style="color: violet;">Admin</p>
                            <?php } else { ?>
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                    <button type="submit">Löschen</button>
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
