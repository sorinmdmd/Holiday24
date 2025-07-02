<?php
/* Smarty version 4.2.0, created on 2025-07-02 18:58:48
  from '/var/www/html/iksy05/Git/Holiday24/smarty/templates/forgotPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68658168703b00_49989709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58724e42e01fd5d40c9f7baeb10d9719016c6ce1' => 
    array (
      0 => '/var/www/html/iksy05/Git/Holiday24/smarty/templates/forgotPassword.tpl',
      1 => 1751482197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_68658168703b00_49989709 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
    <img id="verified" src="images/verified.png" width="100" height="100" />
    
    <!-- Fehlermeldung Container -->
    <div id="error-message" style="color: red;"></div>

    <label id="info_pwrst">Please enter your email so we can send you a verification code</label>
    <form id="email-form" action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="POST">
        <input type="hidden" name="csrf_token" value="<?php if ((isset($_smarty_tpl->tpl_vars['csrf_token']->value))) {
echo $_smarty_tpl->tpl_vars['csrf_token']->value;
}?>">
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required><br>
        <button type="submit">Request verification code</button>
    </form>



    <div class="forgot-password">
        <div class="divider">
            <span>Or else</span>
        </div>
        <a href="registration.php">Register here</a>
    </div>
</main>


    <?php echo '<script'; ?>
>
        document.addEventListener("DOMContentLoaded", function ()) {

            // Wenn das E-Mail-Formular abgeschickt wird, überprüfen wir die E-Mail mit PHP
            document.querySelector('#email-form').addEventListener('submit', function(e) {
                e.preventDefault(); // Verhindert das automatische Abschicken des Formulars


                // Sende die E-Mail zur Überprüfung an den Server (POST Anfrage)
                var formData = new FormData(this);
                
                fetch('<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Wenn die E-Mail existiert, zeigen wir das Verifizierungsformular
                
                    if (data === 'email_exists') {
                        //document.getElementById('verification-box').classList.remove('hidden');
                        document.getElementById('email-form').style.display = 'none';
                        document.getElementById('error-message').innerHTML = ''; // Leeren der Fehlermeldung
                    } else {
                        // Wenn die E-Mail nicht existiert, zeigen wir eine Fehlermeldung im error-message Container
                        document.getElementById('error-message').innerHTML = 'Email could not be resolved to an account.';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }
       
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
