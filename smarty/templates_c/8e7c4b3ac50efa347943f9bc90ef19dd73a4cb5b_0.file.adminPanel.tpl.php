<?php
/* Smarty version 4.2.0, created on 2025-06-03 09:00:18
  from '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/adminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_683eb9a28ee9c9_10974405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e7c4b3ac50efa347943f9bc90ef19dd73a4cb5b' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/adminPanel.tpl',
      1 => 1748940002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:headerAdmin.tpl' => 1,
  ),
),false)) {
function content_683eb9a28ee9c9_10974405 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/sorinotel/Documents/iksy2/Holiday24/classes/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/globalAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:headerAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1 id="adminH1">Admin Panel</h1>
    <div id="userTable">
    <div id="userTable">
        <h1>User Management</h1>
        <div class="benutzerTabelle">
            <table>
                <thead>
                    <tr>
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
    </div>
    <div id="travelManagement">
        <h1>Travel Management</h1>
        <div class="travel-bundle-container">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['travelbundles']->value, 'bundle');
$_smarty_tpl->tpl_vars['bundle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bundle']->value) {
$_smarty_tpl->tpl_vars['bundle']->do_else = false;
?>
                <div class="travel-card">
                    <h2><?php echo $_smarty_tpl->tpl_vars['bundle']->value['city'];?>
</h2>
                    <div class="city-image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['bundle']->value['img_path'];?>
)"></div>
                    <p class="travel-dates">
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['bundle']->value['start_date'],"%d %b %Y");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['bundle']->value['end_date'],"%d %b %Y");?>

                    </p>
                    <p class="travel-price"><b>Price:</b> <?php echo $_smarty_tpl->tpl_vars['bundle']->value['price'];?>
 €</p>
                    <p class="travel-spaces"><b>Free slots:</b> <?php echo $_smarty_tpl->tpl_vars['bundle']->value['available_spaces'];?>
</p>
                    <p class="travel-hotel"><b>Hotel:</b> <?php echo $_smarty_tpl->tpl_vars['bundle']->value['hotel_name'];?>
</p>
                        
                    <div class="travel-buttons">
                        <?php if ($_smarty_tpl->tpl_vars['bundle']->value['available_spaces'] > 0) {?>
                            <a href="" class="edit-button">Edit</a>
                        <?php } else { ?>
                            <span class="soldout-button">Ausgebucht</span>
                        <?php }?>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</body>
</html>
<?php }
}
