<?php
/* Smarty version 4.2.0, created on 2025-01-19 13:34:43
  from '/Users/sorinotel/Documents/IKSY 1/Iksy/probe1/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_678cff73911207_73624765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1949019fed727832587e8d030c5497c100b3b335' => 
    array (
      0 => '/Users/sorinotel/Documents/IKSY 1/Iksy/probe1/smarty/templates/index.tpl',
      1 => 1737293498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678cff73911207_73624765 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probeklausur 2</title>
</head>
<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['ueberschrift']->value;?>
</h1>

    <br>
    <?php if (((isset($_smarty_tpl->tpl_vars['PHP_SELF']->value)))) {?>
    <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
">
        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"/>
        <label for="kundennummer">Kundennummer:</label>
        <input type="number" name="kundennummer" id="kundennummer">
        <br>
        <label for="teamsize">Teamgröße:</label>
        <select name="teamsize" id="teamsize">
            <option value="klein">klein</option>
            <option value="mittel">mittel</option>
            <option value="groß">groß</option>
        </select>
        <br>
        <label for="entfernung">Entfernung:</label>
        <input type="number" name="entfernung" id="entfernung" min="1" max="500" required>
        <br>
        <label for="arbeitszeit">Arbeitszeit:</label>
        <input type="number" name="arbeitszeit" id="arbeitszeit" min="1" max="48" required>
        <br>
        <label for="lastenaufzug">Lastenaufzug benötigt</label>
        <input type="checkbox" name="lastenaufzug" id="lastenaufzug">
        <br>
        <label for="pdf">Ausgabe als PDF?</label>
        <input type="checkbox" name="pdf" id="pdf">
        <br>
        <button type="submit">Abschicken</button>
    </form>
    <?php } else { ?>
		<?php if (((isset($_smarty_tpl->tpl_vars['fehler']->value)))) {?>
			Unzulässige Eingabe.
		<?php } else { ?> 
			<?php echo $_smarty_tpl->tpl_vars['ausgabeText']->value;?>

		<?php }?> 		 					
	<?php }?>
</body>
</html><?php }
}
