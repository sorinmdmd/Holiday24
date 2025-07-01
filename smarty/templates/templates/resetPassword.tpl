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
    
   
    <div id="error-message" style="color: red;">
    {if isset($errorMessage)}
    {$errorMessage}
    {/if}
    </div>

    
    <form action="resetPassword.php" method="POST" id="newPassword">

        <input type="hidden" name="csrf_token" value="{if isset($csrf_token)}{$csrf_token}{/if}">
            
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" value="{if isset($password)}{$password}{/if}" required><br>

        <label for="password2">Verify new Password:</label>
        <input type="password" id="password2" name="password2" value="{if isset($password2)}{$password2}{/if}" required><br>

        <button type="submit">Reset password</button>
    </form>


 
       
    </script>
</body>
</html>
