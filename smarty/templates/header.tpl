<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="icon" href="images/logo.png" type="image/png">
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="Palm Tree Logo">
                <span class="site-name">Holiday24</span>
            </a>
        </div>
        <nav>
            <ul>
             {if isset($user_id) && $user_role == 'customer'}
                    <li><a href="mytravelpacks.php">My Travel Packs</a></li>
                {elseif isset($user_id) && $user_role == 'admin'}
                    <li><a href="admin_panel.php">Admin Panel</a></li>
                {/if}
                <li><a href="angebote.php">Our Offers</a></li>
                <li><a href="aboutus.php">About us</a></li>
               
                <li>
                    {if isset($user_id)}
                        <a href="logout.php">Logout ({$user_role})</a>
                    {else}
                        <a href="login.php">Login</a>
                    {/if}
                </li>
                
            </ul>
        </nav>
    </div>
</header>
