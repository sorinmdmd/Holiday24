<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/verification.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$title}</h1>

        {if isset($error)}
            <p style="color: red;">{$error}</p>
        {/if}
        
        <form method="post" action="verificationPage.php">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit" name="action" value="verify">Verify</button>
        </form>
        
        <form method="post" action="verificationPage.php">
            <button type="submit" name="action" value="resend_email">Resend Verification Email</button>
        </form>
    </main>
    {include file="footer.tpl"}
</body>
{include file="footer.tpl"}
</html>
