<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <main>
        <h1>{$title}</h1>
        <!-- You could list the offers here -->
        <!-- {foreach from=$offers item=offer}
            <div class="offer">
                <h2>{$offer.title}</h2>
                <p>{$offer.description}</p>
            </div>
        {/foreach} -->
    </main>
</body>
</html>
