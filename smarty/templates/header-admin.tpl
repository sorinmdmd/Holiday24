<link rel="stylesheet" type="text/css" href="css/header_admin.css">
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
        <li>
            <li><a class="{if $activePage == 'admin_panel'}active-link{/if}" href="admin_panel.php">ADMIN</a></li>
            <li><a href="admin_panel.php#userTable">Manage Users</a></li>
            <li><a href="admin_panel.php#travelManagement">Manage Travel</a></li>
            <li><a class="{if $activePage == 'ouroffers'}active-link{/if}" href="ouroffers.php">Travelpacks</a></li> 
            <li><a class="accent-link" href="logout.php">Logout - {$user_role}</a></li>
        </li>
    </ul>
</nav>
<div id="overlay" onclick="closeSidebar()"></div>      
<script src="script.js" defer></script>
</header>
