<!-- admin_header.php -->

<?php
// Include your database connection here if needed
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add any necessary styles or links to external stylesheets */
        @import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap');

        body {
            background: #f4f4f4;
            font-family: 'Saira Semi Condensed', sans-serif;
            margin: 0;
        }

        .header {
            background-color: #2f4ad0;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .admin-name-link {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 30px;
            transition: font-size 0.3s ease;
        }

        .admin-name-link:hover {
            text-decoration: none;
            font-size: 35px;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            transition: font-size 0.3s ease;
        }

        .logout-button:hover {
            text-decoration: none;
            font-size: 22px;
        }
    </style>
    <!-- Add any necessary meta tags or links to external stylesheets -->
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="header">
        <!-- Display the admin name as a link to admin_dashboard.php -->
        <a href="admin_dashboard.php" class="admin-name-link">Admin</a>
        <!-- Add a logout button -->
        <a href="admin_logout.php" class="logout-button">Logout</a>
    </div>
</body>

</html>
