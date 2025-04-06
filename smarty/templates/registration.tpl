<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/registration.css">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$title}</h1>
          <form method="post" action="registration.php">
            <input type="hidden" name="csrf_token" value="{if isset($csrf_token)}{$csrf_token}{/if}">

             <label for="firstName">First Name:</label>
            <input type="firstName" id="firstName" name="firstName" value="{if isset($firstName)}{$firstName}{/if}" required><br>

             <label for="lastName">Last Name:</label>
            <input type="lastName" id="lastName" name="lastName" value="{if isset($lastName)}{$lastName}{/if}" required><br>
            
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="{if isset($email)}{$email}{/if}" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{if isset($password)}{$password}{/if}" required><br>
            
            <button type="submit">Register</button>

            <div class="acount-made-question">
                <p>Already have an account? <a href="login.php">Log in here</a></p>
            </div>
        </form>
        {if isset($errorMessage)}
            <p style="color: red;">{$errorMessage}</p>
        {/if}
    </main>
</body>
</html>
