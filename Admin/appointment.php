<?php
// Include database connection file
include('connection.php');
include 'admin_header.php';

// Fetch data from tbl_appointment using prepared statement
$sql = "SELECT a.a_id, a.p_name, h.h_name AS hospital_name, v.v_name AS vaccine_name, a.a_date, a.a_time, a.a_status
        FROM tbl_appointment a
        JOIN tbl_hospital h ON a.h_id = h.h_id
        JOIN tbl_vaccine v ON a.v_id = v.v_id";
$result = $con->prepare($sql);
$result->execute();
$result->store_result();
$result->bind_result($a_id, $p_name, $hospital_name, $vaccine_name, $a_date, $a_time, $a_status);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Appointments List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1010px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll for small screens */
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2f4ad0;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Appointments List</h1>

        <!-- Display the appointments list as a styled table -->
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
                    echo "<td>" . $a_status . "</td>";
                    echo "</tr>";
                }
                $result->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
