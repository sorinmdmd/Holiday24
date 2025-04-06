<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="icon" href="images/logo.png" type="image/png">
<header>
<button id="open-sidebar-button" onclick="openSidebar()">
    <img src="images/menu-button.svg" height="40px" width="40px" fill="#FFA725">
</button>  
<nav id="navbar">
    <ul>
        <li>
            <button id="close-sidebar-button" onclick="closeSidebar()">
                <img src="images/close-button.svg" height="40px" width="40px" fill="#FFA725">
            </button>
        </li>
        <li class="home-li"><a class="active-link" href="index.php">Home</a></li>
        <li><a href="angebote.php">Our trips</a></li>
        {if isset($user_id) && $user_role == 'customer'}
            <li><a href="mytravelpacks.php">My Travel Packs</a></li>
        {elseif isset($user_id) && $user_role == 'admin'}
            <li><a href="admin_panel.php">Admin Panel</a></li>
        {/if}
        <li><a href="aboutus.php">About us</a></li>
        <li>
            {if isset($user_id)}
                <a class="accent-link" href="logout.php">Logout ({$user_role})</a>
            {else}
                <a class="accent-link" href="login.php">Login</a>
            {/if}
        </li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<script src="script.js" defer></script>
</header>
