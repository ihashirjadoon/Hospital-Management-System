<?php
include('connection.php');
session_start();

// Check if the user is not signed in, redirect to the sign-in page
if (!isset($_SESSION['patient_session'])) {
    header("Location: signin.php");
    exit();
}

// Retrieve user's vaccine appointments
$vaccineAppointmentsQuery = "
    SELECT a.a_id, a.a_date, a.a_time, a.a_status, h.h_name as hospital_name, v.v_name as vaccine_name
    FROM tbl_appointment a
    INNER JOIN tbl_hospital h ON a.h_id = h.h_id
    INNER JOIN tbl_vaccine v ON a.v_id = v.v_id
    WHERE a.p_name = ?
";

$vaccineAppointmentsStmt = $con->prepare($vaccineAppointmentsQuery);
$vaccineAppointmentsStmt->bind_param("s", $_SESSION['patient_name']);
$vaccineAppointmentsStmt->execute();
$vaccineAppointmentsResult = $vaccineAppointmentsStmt->get_result();

// Retrieve user's COVID test appointments
$covidTestAppointmentsQuery = "
    SELECT c.test_request_id, c.preferred_date, c.preferred_time, c.test_status, c.result_file, h.h_name as hospital_name
    FROM tbl_covid_test_request c
    INNER JOIN tbl_hospital h ON c.preferred_hospital_id = h.h_id
    WHERE c.patient_name = ?
";

$covidTestAppointmentsStmt = $con->prepare($covidTestAppointmentsQuery);
$covidTestAppointmentsStmt->bind_param("s", $_SESSION['patient_name']);
$covidTestAppointmentsStmt->execute();
$covidTestAppointmentsResult = $covidTestAppointmentsStmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <style>
        /* Add any necessary styles or links to external stylesheets */
        @import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap');

        body {
            background: #f9f9f9;
            font-family: 'Saira Semi Condensed', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            color: #2f4ad0;
            margin-bottom: 20px;
        }

        .appointment-container {
            margin-bottom: 40px;
            width: 80%;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #e0e0e0;
        }

        th,
        td {
            padding: 16px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        /* Styling for buttons */
        .action-button {
            background-color: #2f4ad0;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .action-button:hover {
            background-color: #1c328a;
        }

        /* Add this CSS to your stylesheet or style section */

        a.download-result {
            display: inline-block;
            padding: 8px 12px;
            background-color: #2f4ad0;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a.download-result:hover {
            background-color: #1c328a;
        }
    </style>
</head>

<body>
    <h1>My Appointments</h1>

    <div class="appointment-container">
        <h2>Vaccine Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Hospital</th>
                    <th>Vaccine</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $vaccineAppointmentsResult->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['a_id'] ?></td>
                        <td><?= $row['a_date'] ?></td>
                        <td><?= $row['a_time'] ?></td>
                        <td><?= $row['hospital_name'] ?></td>
                        <td><?= $row['vaccine_name'] ?></td>
                        <td><?= $row['a_status'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="appointment-container">
        <h2>COVID Test Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Test Request ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Hospital</th>
                    <th>Status</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $covidTestAppointmentsResult->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['test_request_id'] ?></td>
                        <td><?= $row['preferred_date'] ?></td>
                        <td><?= $row['preferred_time'] ?></td>
                        <td><?= $row['hospital_name'] ?></td>
                        <td><?= $row['test_status'] ?></td>
                        <td>
                            <?php
                            if ($row['test_status'] === 'completed') {
                                if (!empty($row['result_file'])) {
                                    $resultFilePath = $row['result_file'];
                                    echo '<a href="' . $resultFilePath . '" download class="download-result">Download Result</a>';
                                } else {
                                    echo 'N/A';
                                }
                            } else {
                                echo 'N/A';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>