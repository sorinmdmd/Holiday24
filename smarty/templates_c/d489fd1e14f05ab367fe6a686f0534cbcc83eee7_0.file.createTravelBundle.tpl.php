<?php
/* Smarty version 4.2.0, created on 2025-06-30 17:45:52
  from '/var/www/html/iksy05/Holiday24_test/smarty/templates/createTravelBundle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6862cd50203561_96611448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd489fd1e14f05ab367fe6a686f0534cbcc83eee7' => 
    array (
      0 => '/var/www/html/iksy05/Holiday24_test/smarty/templates/createTravelBundle.tpl',
      1 => 1751305432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:headerAdmin.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6862cd50203561_96611448 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/globalAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="css/ourOffers.css">
    <link rel="stylesheet" type="text/css" href="css/createTravelBundle.css">

</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:headerAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>Create New Travel Bundle</h1>

    <?php if ((isset($_smarty_tpl->tpl_vars['create_error']->value))) {?>
        <div class="error-message"><?php echo $_smarty_tpl->tpl_vars['create_error']->value;?>
</div>
    <?php }?>
    <div class="form-container">
    <form method="POST" action="createTravelBundle.php">
    <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" required>
        </div>

     <div class="form-group">
    <label for="hotel_name">Hotel Name:</label>
    <input type="text" name="hotel_name" id="hotel_name" required>
</div>

<div class="form-group">
    <label for="hotel_address">Hotel Address:</label>
    <input type="text" name="hotel_address" id="hotel_address" required>
</div>


        <div class="form-group">
            <label for="available_spaces">Free Slots:</label>
            <input type="number" name="available_spaces" id="available_spaces" min="0" required>
        </div>

        <div class="form-group">
            <label for="price">Price (€):</label>
            <input type="number" name="price" id="price" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
        </div>

        <div class="form-group">
            <label for="img_path">Image URL:</label>
            <input type="text" name="img_path" id="img_path" required>
        </div>

        <div class="form-buttons">
            <button type="submit" name="create_travelpack" class="save-button">Create</button>
            <button type="button" class="cancel-button" onclick="window.location.href='adminPanel.php'">Cancel</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
