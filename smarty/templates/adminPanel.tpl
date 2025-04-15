<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global_admin.css">
    <link rel="stylesheet" type="text/css" href="css/admin-panel.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header-admin.tpl"}
    <h1 id="adminH1">Admin Panel</h1>
    <div id="userTable">
        <h1>User Management</h1>
        <div class="benutzerTabelle">
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
    </div>
    <div id="travelManagement">
            <h1>Travel Management</h1>
            <div class="travel-bundle-container">
                {foreach from=$travelbundles item=bundle}
                    <div class="travel-card">
                        <h2>{$bundle.city}</h2>
                        <div class="city-image" style="background-image: url({$bundle.img_path})"></div>
                        <p class="travel-dates">
                            {$bundle.start_date|date_format:"%d %b %Y"} - {$bundle.end_date|date_format:"%d %b %Y"}
                        </p>
                        <p class="travel-price"><b>Price:</b> {$bundle.price} €</p>
                        <p class="travel-spaces"><b>Free slots:</b> {$bundle.available_spaces}</p>
                        <p class="travel-hotel"><b>Hotel:</b> {$bundle.hotel_name}</p>
                        
                        <div class="travel-buttons">
                            {if $bundle.available_spaces > 0}
                                <a href="" class="edit-button">Edit</a>
                            {else}
                                <span class="soldout-button">Ausgebucht</span>
                            {/if}
                        </div>
                    </div>
                {/foreach}
            </div>
    </div>
</body>
</html>
