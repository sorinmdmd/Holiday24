<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/homepage.css">
    <title>{$title}</title>
</head>
<body>
    {include file="header.tpl"}
    <section class="home">
        <h1>Finde deine nächste Reise✈️</h1>
        <img src="images/layer1.png" class="img layer1" alt="">
        <img src="images/layer2.png" class="img layer2" alt="">
        <img src="images/layer3.png" class="img layer3" alt="">
    </section>
    {if (isset($PHP_SELF))}
    <form action="{$PHP_SELF}" method="post">
    <input type="hidden" name="csrf_token" value="{$csrf_token}"/>
    
    {else}
        {if (isset($fehler))}
            Unzulässige Eingabe.
        {else} 
            {$ausgabeText}
            <br />
        {/if}
    {/if}
</body>
</html>