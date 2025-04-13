<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            height: 80vh;
            flex-wrap: wrap;
        }

        .big-button {
            padding: 25px 50px;
            font-size: 22px;
            font-weight: bold;
            color: black;
            background: linear-gradient(145deg,rgb(255, 255, 255),rgb(255, 255, 255));
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
        }

        .big-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>
<body>
    {include file="header_admin.tpl"}
    <div class="button-container">
        <a href="manageUsers.php" class="big-button">Manage Users</a>
        <a href="manageTravelPacks.php" class="big-button">Manage Travel Packs</a>
    </div>
</body>
</html>
