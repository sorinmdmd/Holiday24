<!DOCTYPE html>
<html lang="de">
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
        <!-- Hier könntest du die Angebote auflisten -->
        <!-- {foreach from=$angebote item=angebot}
            <div class="angebot">
                <h2>{$angebot.titel}</h2>
                <p>{$angebot.beschreibung}</p>
            </div>
        {/foreach} -->
    </main>
</body>
</html>
