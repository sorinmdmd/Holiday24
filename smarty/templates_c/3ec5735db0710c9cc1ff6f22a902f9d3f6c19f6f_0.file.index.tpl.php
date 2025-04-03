<?php
/* Smarty version 4.2.0, created on 2025-01-17 21:46:06
  from '/Users/sorinotel/Documents/IKSY 1/Iksy/IKSY_Probeklausur1/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_678acf9e3e5a09_42866664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ec5735db0710c9cc1ff6f22a902f9d3f6c19f6f' => 
    array (
      0 => '/Users/sorinotel/Documents/IKSY 1/Iksy/IKSY_Probeklausur1/smarty/templates/index.tpl',
      1 => 1737150363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678acf9e3e5a09_42866664 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic HTML Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>MySQL Request</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>
">
        <!-- Use Smarty syntax for CSRF token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
        
        <label for="nummer">Select which project you want to see</label>
        <br>
        <select name="nummer" id="nummer">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    
    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
    <div class="error-message">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
    <?php }?>
</body>
</html><?php }
}
