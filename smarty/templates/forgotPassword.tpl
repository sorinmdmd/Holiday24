<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
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
    {include file="header.tpl"}
    <main>
    <h1>{$title}</h1>
    <img id="verified" src="images/verified.png" width="100" height="100" />
    
    <!-- Fehlermeldung Container -->
    <div id="error-message" style="color: red;"></div>

    <label id="info_pwrst">Please enter your email so we can send you a verification code</label>
    <form id="email-form" action="{$PHP_SELF}" method="POST">
        <input type="hidden" name="csrf_token" value="{if isset($csrf_token)}{$csrf_token}{/if}">
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" value="{$email}" required><br>
        <button type="submit">Request verification code</button>
    </form>



    <div class="forgot-password">
        <div class="divider">
            <span>Or else</span>
        </div>
        <a href="registration.php">Register here</a>
    </div>
</main>


    <script>
        document.addEventListener("DOMContentLoaded", function ()) {

            // Wenn das E-Mail-Formular abgeschickt wird, überprüfen wir die E-Mail mit PHP
            document.querySelector('#email-form').addEventListener('submit', function(e) {
                e.preventDefault(); // Verhindert das automatische Abschicken des Formulars


                // Sende die E-Mail zur Überprüfung an den Server (POST Anfrage)
                var formData = new FormData(this);
                
                fetch('{$PHP_SELF}', {
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
       
    </script>
</body>
</html>
