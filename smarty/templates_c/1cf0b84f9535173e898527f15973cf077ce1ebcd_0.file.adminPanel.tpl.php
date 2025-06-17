<?php
/* Smarty version 4.2.0, created on 2025-06-17 21:30:35
  from '/var/www/html/iksy05/Git/Holiday24/smarty/templates/adminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6851de7bb5deb7_46554200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cf0b84f9535173e898527f15973cf077ce1ebcd' => 
    array (
      0 => '/var/www/html/iksy05/Git/Holiday24/smarty/templates/adminPanel.tpl',
      1 => 1750195832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:headerAdmin.tpl' => 1,
  ),
),false)) {
function content_6851de7bb5deb7_46554200 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/iksy05/Git/Holiday24/classes/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/globalAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="css/ourOffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
<?php $_smarty_tpl->_assignInScope('today', smarty_modifier_date_format(time(),"%Y-%m-%d"));?>
    <?php $_smarty_tpl->_subTemplateRender("file:headerAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1 id="adminH1">Admin Panel</h1>
    
    <?php if ((isset($_GET['edit_success']))) {?>
        <div class="success-message">Travel pack updated successfully!</div>
    <?php }?>
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
                            <a href="adminPanel.php?edit=<?php echo $_smarty_tpl->tpl_vars['bundle']->value['id'];?>
" class="edit-button">Edit</a>
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

    <?php if ((isset($_smarty_tpl->tpl_vars['editBundle']->value))) {?>
    <div id="editTravel" class="travel">
        <div class="travel-content">
            <span class="close" onclick="window.location.href='adminPanel.php'">&times;</span>
            <h2>Edit Travel Pack: <?php echo $_smarty_tpl->tpl_vars['editBundle']->value['city'];?>
</h2>
            
            <?php if ((isset($_smarty_tpl->tpl_vars['edit_error']->value))) {?>
                <div class="error-message"><?php echo $_smarty_tpl->tpl_vars['edit_error']->value;?>
</div>
            <?php }?>
        
            <form method="POST" action="adminPanel.php">
                <input type="hidden" name="travelpack_id" value="<?php echo $_smarty_tpl->tpl_vars['editBundle']->value['id'];?>
">
                
                <div class="form-group">
                    <label for="hotelid">Hotel:</label>
                    <select name="hotelid" id="hotelid" required>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hotels']->value, 'hotel');
$_smarty_tpl->tpl_vars['hotel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hotel']->value) {
$_smarty_tpl->tpl_vars['hotel']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['hotel']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['hotel']->value['id'] == $_smarty_tpl->tpl_vars['editBundle']->value['hotelid']) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['hotel']->value['name'];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="available_spaces">Free Slots:</label>
                    <input type="number" name="available_spaces" id="available_spaces" 
                           value="<?php echo $_smarty_tpl->tpl_vars['editBundle']->value['available_spaces'];?>
" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price (€):</label>
                    <input type="number" name="price" id="price" 
                           value="<?php echo $_smarty_tpl->tpl_vars['editBundle']->value['price'];?>
" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" 
                           value="<?php echo $_smarty_tpl->tpl_vars['editBundle']->value['start_date'];?>
" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
                </div>
                
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" 
                           value="<?php echo $_smarty_tpl->tpl_vars['editBundle']->value['end_date'];?>
" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
                </div>
                
                <div class="form-buttons">
                    <button type="submit" name="edit_travelpack" class="save-button">Save Changes</button>
                    <button type="button" class="cancel-button" onclick="window.location.href='adminPanel.php'">Cancel</button>
                </div>
                
            </form>
        </div>
    </div>
    <?php }?>

</body>
</html>
<?php }
}
