<?php
/* Smarty version 4.2.0, created on 2025-04-06 15:35:48
  from '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/aboutus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_67f29f5449f026_77813867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f66e100683b4db22c4a4ea1d81b3b34130cc4f5' => 
    array (
      0 => '/Users/dennismac/Documents/Projects/iksy2mainCopy/iksy2/smarty/templates/aboutus.tpl',
      1 => 1743953687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67f29f5449f026_77813867 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
</body>
</html>
<?php }
}
