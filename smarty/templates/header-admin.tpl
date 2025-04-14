<link rel="stylesheet" type="text/css" href="css/header_admin.css">
<header>
<nav id="navbar">
    <ul>
        <li>
            <li><a href="admin_panel.php">ADMIN</a></li>
            <li><a href="#section-one">Manage Users</a></li>
            <li><a class="{if $activePage == '#'}active-link{/if}" href="#">Manage Travel</a></li>
            <li><a class="{if $activePage == 'ouroffers'}active-link{/if}" href="ouroffers.php">Travelpacks</a></li> 
            <li><a class="accent-link" href="logout.php">Logout - {$user_role}</a></li>
        </li>
    </ul>
</nav>
</header>
