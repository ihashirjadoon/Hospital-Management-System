<?php
include('connection.php');
include 'admin_header.php';

// Fetch all COVID test results with hospital names
$query = "SELECT cr.test_request_id, cr.patient_name, h.h_name AS hospital_name, cr.preferred_date, cr.preferred_time, cr.test_status 
          FROM tbl_covid_test_request cr
          JOIN tbl_hospital h ON cr.preferred_hospital_id = h.h_id";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your-css-file.css"> <!-- Include the link to your CSS file here -->
    <title>COVID Test List</title>
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
        <h1>COVID Test List</h1>

        <!-- Display COVID test results in a table -->
        <table>
            <thead>
                <tr>
                    <th>Test Request ID</th>
                    <th>Patient Name</th>
                    <th>Hospital Name</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                    <th>Test Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['test_request_id']}</td>";
                    echo "<td>{$row['patient_name']}</td>";
                    echo "<td>{$row['hospital_name']}</td>";
                    echo "<td>{$row['preferred_date']}</td>";
                    echo "<td>{$row['preferred_time']}</td>";
                    echo "<td>{$row['test_status']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
