<?php
session_start();

// Check if the admin is not logged in, redirect to admin login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include your database connection here
include '../connection.php';

// Fetch admin details from the database
$admin_id = $_SESSION['admin_id'];
$query = "SELECT * FROM tbl_admin WHERE a_id = '$admin_id'";
$result = mysqli_query($con, $query);
$admin = mysqli_fetch_assoc($result);
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

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .dashboard-options {
            background-color: #2f4ad0;
            border-radius: 8px;
            padding: 20px;
            width: 18%;
            text-align: center;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-options a {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #1c328a;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-options a:hover {
            background-color: #2f4ad0;
        }

        .main-content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 78%;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="header">
        <!-- Display the admin name as a link to admin_dashboard.php -->
        <a href="admin_dashboard.php" class="admin-name-link"><?php echo $admin['a_name']; ?></a>
        <!-- Add a logout button -->
        <a href="admin_logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <div class="dashboard-options">
            <!-- Add links to admin-specific pages here -->
            <a href="appointment.php">Vaccine Appointments</a>
            <a href="display_hospital.php">Registered Hospitals List</a>
            <a href="covid_test_list.php">COVID Test Appointments List</a>
            <a href="../register_hospital.php">Register a Hospital</a>
            <!-- Add more links as needed -->
        </div>

        <div class="main-content">
            <!-- Add content specific to the admin dashboard here -->
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is the main content area of your admin portal.</p>
            <p>Admin ID: <?php echo $admin['a_id']; ?></p>
            <p>Name: <?php echo $admin['a_name']; ?></p>
            <p>Email: <?php echo $admin['a_email']; ?></p>
            <!-- Add more details as needed -->
        </div>
    </div>
</body>

</html>
