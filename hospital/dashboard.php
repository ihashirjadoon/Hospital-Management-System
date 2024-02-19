<?php
session_start();

// Check if the hospital is not logged in, redirect to login page
if (!isset($_SESSION['hospital_id'])) {
    header("Location: login.php");
    exit();
}

// Include your database connection here
include '../connection.php';

// Fetch hospital details from the database
$hospital_id = $_SESSION['hospital_id'];
$query = "SELECT * FROM tbl_hospital WHERE h_id = '$hospital_id'";
$result = mysqli_query($con, $query);
$hospital = mysqli_fetch_assoc($result);
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

        .hospital-name-link {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 30px; /* Increase font size */
            transition: font-size 0.3s ease; /* Add transition */
        }

        .hospital-name-link:hover {
            text-decoration: none;
            font-size: 35px; /* Increase font size on hover */
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            transition: font-size 0.3s ease; /* Add transition */
        }

        .logout-button:hover {
            text-decoration: none;
            font-size: 22px; /* Increase font size on hover */
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
            width: 78%; /* Adjusted width */
        }
    </style>
    <title>Hospital Portal</title>
</head>

<body>
    <div class="header">
        <!-- Display the hospital name as a link to dashboard.php -->
        <a href="dashboard.php" class="hospital-name-link"><?php echo $hospital['h_name']; ?></a>
        <!-- Add a logout button -->
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <div class="dashboard-options">
            <a href="vaccine_appointments.php">Vaccine Appointments</a>
            <a href="covid_test_appointments.php">COVID Test Appointments</a>
        </div>

        <div class="main-content">
            <!-- Display hospital profile information -->
            <h2>Welcome to the Hospital Portal!</h2>
            <p>This is the main content area of your portal.</p>
            <p>Hospital ID: <?php echo $hospital['h_id']; ?></p>
            <p>Contact: <?php echo $hospital['h_contact']; ?></p>
            <p>City: <?php echo $hospital['h_city']; ?></p>
            <p>Address: <?php echo $hospital['h_address']; ?></p>
            <p>Email: <?php echo $hospital['h_email']; ?></p>
            <!-- Add more details as needed -->
        </div>
    </div>
</body>

</html>
