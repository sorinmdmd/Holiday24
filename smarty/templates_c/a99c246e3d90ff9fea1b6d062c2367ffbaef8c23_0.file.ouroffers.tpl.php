<?php
/* Smarty version 4.2.0, created on 2025-04-07 10:18:52
  from '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/ouroffers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f3a68cdf9956_71758467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a99c246e3d90ff9fea1b6d062c2367ffbaef8c23' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/iksy2/smarty/templates/ouroffers.tpl',
      1 => 1744021109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67f3a68cdf9956_71758467 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/sorinotel/Documents/iksy2/iksy2/classes/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- Search Menu -->
    <div class="search-menu">
        <div class="search-fields">
            <!-- Destination country -->
            <input type="text" id="country" name="i_country" placeholder="Destination country" pattern="/^[a-zÀ-ÿ ,.'-]+$/i">

            <!-- Month of Travel Dropdown -->
            <select name="month">
                <option value="" disabled selected>Month of travel</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'name', false, 'id');
$_smarty_tpl->tpl_vars['name']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>

            <!-- Travelers Dropdown -->
            <select name="number_travelers">
                <option value="" disabled selected>Travelers</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="submit-button">
            <input type="submit" id="submit_btn" name="Button1" value="Let's go!">
        </div>
    </div>

    <!-- Main section -->

    <main class="content">
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <section id="our-offers">
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
                            <a href="tripdetails.php?id=<?php echo $_smarty_tpl->tpl_vars['bundle']->value['id'];?>
" class="info-button">Mehr Info</a>
                            <?php if ($_smarty_tpl->tpl_vars['bundle']->value['available_spaces'] > 0) {?>
                                <a href="booking.php?id=<?php echo $_smarty_tpl->tpl_vars['bundle']->value['id'];?>
" class="book-button">Buchen</a>
                            <?php } else { ?>
                                <span class="soldout-button">Ausgebucht</span>
                            <?php }?>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </section>
    </main>
</body>
</html>
<?php }
}
