<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header_admin.tpl"}
    <h1>Benutzerverwaltung</h1>
    <div class="benutzerTabelle">
        <a href="">Neuen Benutzer hinzufügen</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                {foreach $users as $user}
                    <tr>
                        <td>{$user.id}</td>
                        <td>{$user.first_name}{$user.last_name}</td>
                        <td>{$user.email}</td>
                        <td>
                            {if $user.id == 0}
                                <p style="color: violet;">Admin</p>
                            {else}
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_user_id" value="{$user.id}">
                                    <button type="submit">Löschen</button>
                                </form>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</body>
</html>
