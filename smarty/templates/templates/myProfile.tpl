<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/myProfile.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$title}</h1>

        <!-- Display user information -->
        <div>
            <h2>User Information</h2>
            <p><strong>First Name:</strong> {$me[0].first_name}</p>
            <p><strong>Last Name:</strong> {$me[0].last_name}</p>
            <p><strong>Email:</strong> {$me[0].email}</p>
            <p><strong>Verified:</strong>
                {if $me[0].verified == 1}
                   ✅
                {else}
                    ❌
                    <form action="verificationPage.php" method="post" style="display:inline;">
                        <button type="submit">Verify Account</button>
                    </form>
                {/if}
            </p>
            <!-- Add more fields as needed -->
        </div>
    </main>
</body>
</html>
