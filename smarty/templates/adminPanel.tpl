<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/globalAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="headerAdmin.tpl"}
    <h1 id="adminH1">Admin Panel</h1>
    
    {if isset($smarty.get.edit_success)}
        <div class="success-message">Travel pack updated successfully!</div>
    {/if}
    <div id="userTable">
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
                            <a href="adminPanel.php?edit={$bundle.id}" class="edit-button">Edit</a>
                        {else}
                            <span class="soldout-button">Ausgebucht</span>
                        {/if}
                    </div>
                </div>
            {/foreach}
        </div>
    </div>

    {if isset($editBundle)}
    <div id="editTravel" class="travel">
        <div class="travel-content">
            <span class="close" onclick="window.location.href='adminPanel.php'">&times;</span>
            <h2>Edit Travel Pack: {$editBundle.city}</h2>
            
            {if isset($edit_error)}
                <div class="error-message">{$edit_error}</div>
            {/if}
            
            <form method="POST" action="adminPanel.php">
                <input type="hidden" name="travelpack_id" value="{$editBundle.id}">
                
                <div class="form-group">
                    <label for="hotelid">Hotel:</label>
                    <select name="hotelid" id="hotelid" required>
                        {foreach from=$hotels item=hotel}
                            <option value="{$hotel.id}" {if $hotel.id == $editBundle.hotelid}selected{/if}>
                                {$hotel.name}
                            </option>
                        {/foreach}
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="available_spaces">Free Slots:</label>
                    <input type="number" name="available_spaces" id="available_spaces" 
                           value="{$editBundle.available_spaces}" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price (€):</label>
                    <input type="number" name="price" id="price" 
                           value="{$editBundle.price}" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" 
                           value="{$editBundle.start_date}" required>
                </div>
                
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" 
                           value="{$editBundle.end_date}" required>
                </div>
                
                <div class="form-buttons">
                    <button type="submit" name="edit_travelpack" class="save-button">Save Changes</button>
                    <button type="button" class="cancel-button" onclick="window.location.href='adminPanel.php'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    {/if}

</body>
</html>
