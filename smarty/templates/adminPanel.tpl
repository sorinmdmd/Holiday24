<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global_admin.css">
    <link rel="stylesheet" type="text/css" href="css/admin-panel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header-admin.tpl"}
    <h1>Admin Panel</h1>
    <div class="button-container">
        <a href="manageUsers.php" class="big-button">Manage Users</a>
        <a href="manageTravelPacks.php" class="big-button">Manage Travel Packs</a>
    </div>
    <h1>User Management</h1>
    <div class="benutzerTabelle" id="section-one">
        <table>
            <thead>
                <tr>
                    <th>First and Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {foreach $users as $user}
                    <tr>
                        <td>{$user.first_name} {$user.last_name}</td>
                        <td>{$user.email}</td>
                        <td>
                            {if $user.id == 0}
                            {else}
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_user_id" value="{$user.id}">
                                    <button type="submit">Delete</button>
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
