<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
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
        <li class="home-li"><a class="{if $activePage == 'index'}active-link{/if}" href="index.php">Home</a></li>
        {if isset($user_id) && $user_role == 'customer'}
            <li><a class="{if $activePage == 'mytravelpacks'}active-link{/if}" href="myTravelpacks.php">My Travel Packs</a></li>
            <li><a class="{if $activePage == 'myProfile'}active-link{/if}" href="myProfile.php">My Profile</a></li>
        {/if}
        <li><a class="{if $activePage == 'ouroffers'}active-link{/if}" href="ouroffers.php">Our trips</a></li>
        <li><a class="{if $activePage == 'aboutus'}active-link{/if}" href="index.php#aboutusId">About us</a></li>
        <li>
            {if isset($user_id)}
                <a class="accent-link" href="logout.php">Logout</a>
            {else}
                <a class="accent-link" href="login.php">Login</a>
            {/if}
        </li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<script src="script.js" defer></script>
</header>
