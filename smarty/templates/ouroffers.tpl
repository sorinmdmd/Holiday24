<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/ouroffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <!-- Search Menu -->
    <div class="search-menu">
        <div class="search-fields">
            <!-- Destination country -->
            <input type="text" id="country" name="i_country" placeholder="Destination country" pattern="/^[a-zÀ-ÿ ,.'-]+$/i">

            <!-- Month of Travel Dropdown -->
            <select name="month">
                <option value="" disabled selected>Month of travel</option>
                {foreach key=id item=name from=$months}
                    <option value="{$id}">{$name}</option>
                {/foreach}
            </select>

            <!-- Travelers Dropdown -->
            <select name="number_travelers">
                <option value="" disabled selected>Travelers</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="submit-button">
            <input type="submit" id="submit_btn" name="Button1" value="Let's go!">
        </div>
    </div>

    <!-- Main section -->

    <main class="content">
        <h1>{$title}</h1>
        <section id="our-offers">
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
                            <a href="tripdetails.php?id={$bundle.id}" class="info-button">Mehr Info</a>
                            {if $bundle.available_spaces > 0}
                                <a href="booking.php?id={$bundle.id}" class="book-button">Buchen</a>
                            {else}
                                <span class="soldout-button">Ausgebucht</span>
                            {/if}
                        </div>
                    </div>
                {/foreach}
            </div>
        </section>
    </main>
</body>
</html>
