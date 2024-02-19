<?php
// Include database connection file
include('../connection.php');

session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get array of appointment IDs and corresponding new statuses from the form
    $appointment_ids = isset($_POST['appointment_id']) ? $_POST['appointment_id'] : [];

    // Ensure $appointment_ids is an array
    if (is_array($appointment_ids)) {
        // Iterate through the array and update statuses in the database
        foreach ($appointment_ids as $index => $appointment_id) {
        // Set the new status to the selected option from the form
$new_status = isset($_POST['new_status'][$index]) ? $_POST['new_status'][$index] : '';

// Update the status in the database
$updateQuery = "UPDATE tbl_appointment SET a_status = ? WHERE a_id = ? AND h_id = ?";
$updateStatement = $con->prepare($updateQuery);
$updateStatement->bind_param("sii", $new_status, $appointment_id, $_SESSION['hospital_id']);


            if ($updateStatement->execute()) {
                echo "<script>alert('Status updated successfully!'); window.location.href='vaccine_appointments.php';</script>";
            } else {
                echo "Error updating status: " . $updateStatement->error;
            }

            // Close the prepared statement
            $updateStatement->close();
        }
    } else {
        // Handle the case where $appointment_ids is not an array
        echo "Error: Appointment IDs should be an array.";
    }
}

// Fetch data from tbl_appointment using prepared statement
$sql = "SELECT a.a_id, a.p_name, h.h_name AS hospital_name, v.v_name AS vaccine_name, a.a_date, a.a_time, a.a_status
        FROM tbl_appointment a
        JOIN tbl_hospital h ON a.h_id = h.h_id
        JOIN tbl_vaccine v ON a.v_id = v.v_id
        WHERE a.h_id = ?";
$result = $con->prepare($sql);
$result->bind_param("i", $_SESSION['hospital_id']);
$result->execute();
$result->store_result();
$result->bind_result($a_id, $p_name, $hospital_name, $vaccine_name, $a_date, $a_time, $a_status);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="styles.css">
    <title>Vaccine Appointments</title>
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

        .logout-link {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1010px;
            margin: 0 auto; /* Center the container */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll for small screens */
        }

        h1 {
            text-align: center;
            color: #fff; /* Match the theme color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2f4ad0;
            color: #fff;
        }

        thead {
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-container {
            overflow-x: auto;
        }

        .status-dropdown {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            transition: background-color 0.3s ease;
        }

        .status-dropdown:focus {
            background: rgba(255, 255, 255, 1);
        }

        input[type="submit"] {
            display: block;
            margin: 10px auto;
            background: #2f4ad0;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #1c328a;
        }

        .dashboard-link {
            text-align: left;
            position: fixed;
            top: 40px;
            left: 20px; /* Move to the left */
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 25px; /* Increase font size */
            transition: font-size 0.3s ease; /* Add transition */
        }

        .dashboard-link:hover {
            text-decoration: none;
            font-size: 28px; /* Increase font size on hover */
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Vaccine Appointments</h1>
        <!-- Add a link to the dashboard in the top right corner -->
        <a href="dashboard.php" class="dashboard-link">Portal</a>
    </div>

    <div class="container">
        <!-- Display the appointments list as a styled table -->
        <div class="table-container">
            <form method="post" action="">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Hospital</th>
                            <th>Vaccine</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($result->fetch()) {
                            echo "<tr>";
                            echo "<td class='appointment-id'>" . $a_id . "</td>";
                            echo "<td>" . $p_name . "</td>";
                            echo "<td>" . $hospital_name . "</td>";
                            echo "<td>" . $vaccine_name . "</td>";
                            echo "<td>" . $a_date . "</td>";
                            echo "<td>" . $a_time . "</td>";
                            echo "<td>";
                            echo "<select name='new_status[]' class='status-dropdown'>";
                            echo "<option value='pending' " . ($a_status == 'pending' ? 'selected' : '') . ">Pending</option>";
                            echo "<option value='approved' " . ($a_status == 'approved' ? 'selected' : '') . ">Approved</option>";
                            echo "<option value='canceled' " . ($a_status == 'canceled' ? 'selected' : '') . ">Canceled</option>";
                            echo "<option value='completed' " . ($a_status == 'completed' ? 'selected' : '') . ">Completed</option>";
                            echo "</select>";
                            // Add a hidden input field for each appointment ID
                            echo "<input type='hidden' name='appointment_id[]' value='$a_id'>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        $result->close();
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="Update Status">
            </form>
        </div>
    </div>
</body>

</html>
