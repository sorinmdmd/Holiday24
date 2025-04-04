<link rel="stylesheet" type="text/css" href="css/header.css">
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
                <li><a href="angebote.php">Unsere Angebote</a></li>
                <li><a href="aboutus.php">Über uns</a></li>
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
