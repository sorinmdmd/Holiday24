<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo.png" type="image/png">

    <title>{$title}</title>
</head>
<body>
    {include file="header.tpl"}
    <h1>Welcome to Holiday24</h1>
    <p>This is a basic HTML template using Smarty.</p>

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