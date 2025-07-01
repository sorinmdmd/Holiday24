<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$title}</h1>
        {if isset($fehler)}
            <p style="color: red;">{$fehler}</p>
        {/if}
        <form action="{$PHP_SELF}" method="POST">
            <input type="hidden" name="csrf_token" value="{if isset($csrf_token)}{$csrf_token}{/if}">
            
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="{if isset($email)}{$email}{/if}" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{if isset($password)}{$password}{/if}" required><br>
            
            <button type="submit">Log In</button>
        </form>
        <div class="forgot-password">
            <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </div>
    </main>
    {include file="footer.tpl"}
</body>
</html>