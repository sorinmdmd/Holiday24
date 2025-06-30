<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link rel="icon" href="/images/logo.png" type="image/png">
    <title>{$title}</title>
</head>
<body>
    {include file="header.tpl"}
    <!-- Einzelne Bilder, die übereinander dargestellt werden -->
    <section class="home">
        <img src="images/layer1.png" class="img layer1" alt="Layer 1">
        <img src="images/layer2.png" class="img layer2" alt="Layer 2">
        <img src="images/layer3.png" class="img layer3" alt="Layer 3">
        <h1>Your Journey Starts Here ✈️</h1>
    </section>

    <!-- Einbindung der aboutUs.tpl in index und CSRF Schutz -->
    {if isset($PHP_SELF)}
    <form action="{$PHP_SELF}" method="post">
        <input type="hidden" name="csrf_token" value="{$csrf_token}">
        <div id="aboutusId">
            {include file="aboutUs.tpl"}
        </div>
    </form>
    {elseif isset($fehler)}
        <p>Unzulässige Eingabe.</p>
    {else}
        <p>{$ausgabeText}</p>
    {/if}
    {include file="footer.tpl"}
</body>
{include file="footer.tpl"}

</html>
