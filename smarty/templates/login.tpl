<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$ueberschrift}</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$ueberschrift}</h1>
        {if isset($fehler)}
            <p style="color: red;">{$fehler}</p>
        {/if}
       <form action="{$PHP_SELF}" method="POST">
    <input type="hidden" name="csrf_token" value="{if isset($csrf_token)}{$csrf_token}{/if}">
    
    <label for="email">E-Mail:</label>
    <input type="email" id="email" name="email" value="{if isset($email)}{$email}{/if}" required><br>
    
    <label for="password">Passwort:</label>
    <input type="password" id="password" name="password" value="{if isset($password)}{$password}{/if}" required><br>
    
    <button type="submit">Anmelden</button>

    <div class="forgot-password">
        <a href="passwort_vergessen.php">Passwort vergessen?</a>
    </div>
</form>
    </main>
</body>
</html>
