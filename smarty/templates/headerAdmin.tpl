<link rel="stylesheet" type="text/css" href="css/headerAdmin.css">
<header>
<button id="open-sidebar-button" onclick="openSidebar()">
    <img src="images/menu-button.svg" height="40px" width="40px" fill="#FFA725">
</button>  
<!-- Navigationsbar für das Adminpanel. Funktionen gleich zum normalen Navbar. -->
<nav id="navbar">
    <ul>
        <li>
            <button id="close-sidebar-button" onclick="closeSidebar()">
                <img src="images/close-button.svg" height="40px" width="40px" fill="#FFA725">
            </button>
        </li>
        <li>
        <li><a class="{if isset($activePage) and $activePage == 'adminPanel'}active-link{/if}" href="adminPanel.php">ADMIN</a></li>
        <li><a href="adminPanel.php#userTable">Manage Users</a></li>
        <li><a href="adminPanel.php#travelManagement">Manage Travel</a></li>
        <li><a class="{if isset($activePage) and $activePage == 'ouroffers'}active-link{/if}" href="ourOffers.php">Travelpacks</a></li>
        <li><a class="accent-link" href="logout.php">Logout{if isset($user_role)} - {$user_role}{/if}</a></li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<script src="script.js" defer></script>
</header>
