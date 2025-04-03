<?php
/* Smarty version 4.2.0, created on 2025-01-17 21:40:46
  from '/Users/sorinotel/Documents/IKSY 1/Iksy/IKSY_Probeklausur1/smarty/templates/result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_678ace5e0ffbe1_83569226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d367ea17f53da33add77a12c5686293809054c4' => 
    array (
      0 => '/Users/sorinotel/Documents/IKSY 1/Iksy/IKSY_Probeklausur1/smarty/templates/result.tpl',
      1 => 1737150036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678ace5e0ffbe1_83569226 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Result Page</h1>
    
    <table style="border-collapse: collapse; width: auto; margin: 0 auto;">
        <tr style="border: 1px solid black;">
            <th style="border: 1px solid black; padding: 8px;">ProjektNr</th>
            <th style="border: 1px solid black; padding: 8px;">Bezeichnung</th>
            <th style="border: 1px solid black; padding: 8px;">AufwandTage</th>
            <th style="border: 1px solid black; padding: 8px;">Kosten</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px;"><?php echo $_smarty_tpl->tpl_vars['ProjektNr']->value;?>
</td>
            <td style="border: 1px solid black; padding: 8px;"><?php echo $_smarty_tpl->tpl_vars['Bezeichnung']->value;?>
</td>
            <td style="border: 1px solid black; padding: 8px;"><?php echo $_smarty_tpl->tpl_vars['AufwandTage']->value;?>
</td>
            <td style="border: 1px solid black; padding: 8px;"><?php echo $_smarty_tpl->tpl_vars['cost']->value;?>
</td>
        </tr>
    </table>
    
    <a href="index.php">Back to Form</a>
</body>
</html><?php }
}
