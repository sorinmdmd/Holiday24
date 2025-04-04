<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Forms.css">
    <link rel="stylesheet" type="text/css" href="css/Tables.css">
    <title>Sample Project</title>
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