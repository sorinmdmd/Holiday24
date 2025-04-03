<?php
/* Smarty version 4.2.0, created on 2025-01-17 18:54:24
  from '/Users/sorinotel/Downloads/IKSY_Probeklausur1/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_678aa760dcc624_25427194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ef533b32aa7d7083f20bdf43f196d205f3bcb1f' => 
    array (
      0 => '/Users/sorinotel/Downloads/IKSY_Probeklausur1/smarty/templates/index.tpl',
      1 => 1737140060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678aa760dcc624_25427194 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic HTML Page</title>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>
">
        <label for="nummer">Nummer</label>
        <input type="number" name="nummer" id="nummer">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
</body>
</html><?php }
}
