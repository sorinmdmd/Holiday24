<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/homepage.css">

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title>{$title}</title>
</head>

<body>
    {include file="header.tpl"}

    <section class="home">
        <h1>Your Journey Starts Here✈️</h1>
    </section>

    <form action="{$PHP_SELF}" method="post">
        <input type="hidden" name="csrf_token" value="{$csrf_token}" />
        <div id="aboutusId">
            {include file="aboutUs.tpl"}
        </div>
    </form>

    {if isset($fehler)}
        <p class="error">Unzulässige Eingabe.</p>
    {elseif isset($ausgabeText)}
        <p class="success">{$ausgabeText}</p>
    {/if}
</body>

</html>