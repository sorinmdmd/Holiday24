<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/globalAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="css/ourOffers.css">
    <link rel="stylesheet" type="text/css" href="css/createTravelBundle.css">

</head>
<body>
    {include file="headerAdmin.tpl"}
    <h1>Create New Travel Bundle</h1>

    {if isset($create_error)}
        <div class="error-message">{$create_error}</div>
    {/if}
    <div class="form-container">
    <form method="POST" action="createTravelBundle.php">
    <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" required>
        </div>

     <div class="form-group">
    <label for="hotel_name">Hotel Name:</label>
    <input type="text" name="hotel_name" id="hotel_name" required>
</div>

<div class="form-group">
    <label for="hotel_address">Hotel Address:</label>
    <input type="text" name="hotel_address" id="hotel_address" required>
</div>


        <div class="form-group">
            <label for="available_spaces">Free Slots:</label>
            <input type="number" name="available_spaces" id="available_spaces" min="0" required>
        </div>

        <div class="form-group">
            <label for="price">Price (€):</label>
            <input type="number" name="price" id="price" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" min="{$today}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" min="{$today}" required>
        </div>

        <div class="form-group">
            <label for="img_path">Image URL:</label>
            <input type="text" name="img_path" id="img_path" required>
        </div>

        <div class="form-buttons">
            <button type="submit" name="create_travelpack" class="save-button">Create</button>
            <button type="button" class="cancel-button" onclick="window.location.href='adminPanel.php'">Cancel</button>
        </div>
    </form>
</div>
</body>
{include file="footer.tpl"}
</html>
