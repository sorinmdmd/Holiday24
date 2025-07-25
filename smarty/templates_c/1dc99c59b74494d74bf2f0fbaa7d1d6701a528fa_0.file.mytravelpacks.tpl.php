<?php
/* Smarty version 4.2.0, created on 2025-04-19 11:15:32
  from 'C:\Users\Acer\OneDrive\HS Bochum\SS25\IKSY II\git\iksy2\smarty\templates\mytravelpacks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_680385d479fc18_61771404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1dc99c59b74494d74bf2f0fbaa7d1d6701a528fa' => 
    array (
      0 => 'C:\\Users\\Acer\\OneDrive\\HS Bochum\\SS25\\IKSY II\\git\\iksy2\\smarty\\templates\\mytravelpacks.tpl',
      1 => 1745061328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:headerAdmin.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_680385d479fc18_61771404 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\Acer\\OneDrive\\HSBochum\\SS25\\IKSYII\\git\\iksy2\\classes\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php if ((isset($_smarty_tpl->tpl_vars['user_id']->value)) && $_smarty_tpl->tpl_vars['user_role']->value == 'admin') {?>
        <?php $_smarty_tpl->_subTemplateRender("file:headerAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   <!-- Wenn user_role = admin, dann Admin Panel im Menu zeigen -->
    <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>


    <!-- Main section -->

    <main class="content">
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        
        <section id="our-offers">
            <?php if ($_smarty_tpl->tpl_vars['no_results']->value) {?>
                <div class="no-results" id="filter_error">
                    Sorry, there are no travelpacks matching your search at the moment.
                </div>
            <?php }?>

            <div class="travel-bundle-container">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bookings']->value, 'booking');
$_smarty_tpl->tpl_vars['booking']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['booking']->value) {
$_smarty_tpl->tpl_vars['booking']->do_else = false;
?>
                    <div class="travel-card">
                        <h2><?php echo $_smarty_tpl->tpl_vars['booking']->value['city'];?>
</h2>
                        <div class="city-image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['booking']->value['img_path'];?>
)"></div>
                        <p class="travel-dates">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['booking']->value['start_date'],"%d %b %Y");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['booking']->value['end_date'],"%d %b %Y");?>

                        </p>
                        <p class="travel-price"><b>Price:</b> <?php echo $_smarty_tpl->tpl_vars['booking']->value['price'];?>
 €</p>
                        <p class="travel-spaces"><b>Free slots:</b> <?php echo $_smarty_tpl->tpl_vars['booking']->value['available_spaces'];?>
</p>
                        <p class="travel-spaces"><b>My booked slots:</b> <?php echo $_smarty_tpl->tpl_vars['booking']->value['booked_slots'];?>
</p>
                        <p class="travel-hotel"><b>Hotel:</b> <?php echo $_smarty_tpl->tpl_vars['booking']->value['hotel_name'];?>
</p>
                        
                        <div class="travel-buttons">
                            <form method="post" action="mytravelpacks.php"
                                onsubmit="return confirm('Are you sure you want to cancel this trip?');">
                                <input type="hidden" name="travelbundleid" value="<?php echo $_smarty_tpl->tpl_vars['booking']->value['id'];?>
">
                                <button type="submit" name="cancel_booking" class="cancel-button">Cancel</button>
                            </form>

                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </section>
        
    </main>
</body>
</html><?php }
}
