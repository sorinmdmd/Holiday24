<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/ourOffers.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>
<body>
    {include file="header.tpl"}
    <!-- Main section -->
    <main class="content">
        <h1>{$title}</h1>
        
        <section id="our-offers">
            {if $no_results}
                <div class="no-results" id="filter_error">
                    Sorry, there are no travelpacks matching your search at the moment.
                </div>
            {/if}

            <div class="travel-bundle-container">
                {foreach from=$bookings item=booking}
                    <div class="travel-card">
                        <h2>{$booking.city}</h2>
                        <div class="city-image" style="background-image: url({$booking.img_path})"></div>
                        <p class="travel-dates">
                            {$booking.start_date|date_format:"%d %b %Y"} - {$booking.end_date|date_format:"%d %b %Y"}
                        </p>
                        <p class="travel-price"><b>Price:</b> {$booking.price} €</p>
                        <p class="travel-spaces"><b>Free slots:</b> {$booking.available_spaces}</p>
                        <p class="travel-spaces"><b>My booked slots:</b> {$booking.booked_slots}</p>
                        <p class="travel-hotel"><b>Hotel:</b> {$booking.hotel_name}</p>
                        
                        <div class="travel-buttons">
                            <form method="post" action="myTravelPacks.php"
                                onsubmit="return confirm('Are you sure you want to cancel this trip?');">
                                <input type="hidden" name="travelbundleid" value="{$booking.id}">
                                <button type="submit" name="cancel_booking" class="cancel-button">Cancel</button>
                            </form>
                        </div>
                    </div>
                {/foreach}
            </div>
        </section>
    </main>
    {include file="footer.tpl"}
</body>
{include file="footer.tpl"}
</html>