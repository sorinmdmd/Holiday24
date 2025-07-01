<?php
/* Smarty version 4.2.0, created on 2025-06-30 10:28:18
  from '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/aboutUs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686266c2f2abd0_65534146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b27d255615a8c07a9512885e1cf543b05153d003' => 
    array (
      0 => '/Users/sorinotel/Documents/iksy2/Holiday24/smarty/templates/aboutUs.tpl',
      1 => 1751279296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686266c2f2abd0_65534146 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/aboutUs.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <main>
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <section id="about-us">
            <p>Welcome to Holiday24, your ultimate destination for hassle-free travel planning. We specialize in curating exceptional travel bundles that include top-notch hotels and exciting experiences, all tailored to make your journey unforgettable.</p>
            <p>Our mission is to provide you with seamless and affordable travel solutions. Whether you're planning a romantic getaway, a family vacation, or an adventure-packed trip, our carefully crafted bundles ensure that every aspect of your travel is covered.</p>
            <p>With a passion for travel and a commitment to excellence, our team works tirelessly to handpick the best hotels and local attractions. We believe that travel should be enjoyable and stress-free, and we strive to make that a reality for each of our customers.</p>
            <p>Join us on this journey and let us help you create memories that will last a lifetime. Your adventure awaits!</p>
        </section>
    </main>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
