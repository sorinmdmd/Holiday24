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
                        <a href="">Bearbeiten</a>
                        <a>|</a>
                        <a href="">Löschen</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</body>
</html>
