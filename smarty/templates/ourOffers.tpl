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
    {if isset($user_id) && $user_role == 'admin'}
        {include file="headerAdmin.tpl"}   <!-- Wenn user_role = admin, dann Admin Panel im Menu zeigen -->
    {else}
        {include file="header.tpl"}
    {/if}
    
    <!-- Search Menu -->
    <div class="search-menu">
        <form method="post" action="ourOffers.php">
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
        </form>
    </div>

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
                                {if isset($user_id)}
                                    <form method="post" action="ourOffers.php" class="inline-booking-form">
                                        <input type="hidden" name="book_bundle_id" value="{$bundle.id}">
                                        <input type="hidden" name="free_slots" value="{$bundle.available_spaces}">
                                        <select name="slots" id="slots_{$bundle.id} placeholder ="Number of slots">
                                            <option value="" disabled selected>Travelers</option>
                                            {section name=i start=1 loop=6}
                                                {if $smarty.section.i.index <= $bundle.available_spaces}
                                                    <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
                                                {/if}
                                            {/section}
                                        </select>
                                        <button type="submit" name="confirm_booking" class="book-button">Book</button>
                                    </form>
                                {else}
                                    <a href="login.php" class="book-button">Book</a>
                                {/if}
                            {else}
                                <span class="soldout-button">Full</span>
                            {/if}
                        </div>

                    </div>
                {/foreach}
            </div>
        </section>
    </main>
    
    {if isset($account_not_verified) && $account_not_verified}
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                alert("Please verify your account before booking a trip.");
            });
        </script>
    {/if}

</body>
</html>
