<?php
// Include database connection file
include('connection.php');

// Fetch data from tbl_patients using prepared statement
$sql = "SELECT p_id, p_name, p_contact, p_city, p_email FROM tbl_patients";
$result = $con->prepare($sql);
$result->execute();
$result->store_result();
$result->bind_result($p_id, $p_name, $p_contact, $p_city, $p_email);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Patients List</title>
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .edit-button,
        .delete-button {
            margin: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button {
            background-color: #008CBA;
            color: #fff;
        }

        .edit-button:hover {
            background-color: #005684;
        }

        .delete-button {
            background-color: red;
            color: #fff;
        }

        .delete-button:hover {
            background-color: rgb(183, 10, 10);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Patients List</h1>

        <!-- Display the patients list as a styled table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result->fetch()) {
                    echo "<tr>";
                    echo "<td class='patient-id'>" . $p_id . "</td>";
                    echo "<td>" . $p_name . "</td>";
                    echo "<td>" . $p_contact . "</td>";
                    echo "<td>" . $p_city . "</td>";
                    echo "<td>" . $p_email . "</td>";
                    echo "<td class='action-buttons'>";
                    echo "<button class='edit-button' onclick='editPatient(" . $p_id . ")'>Edit</button>";
                    echo "<button class='delete-button' onclick='deletePatient(" . $p_id . ")'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                $result->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function editPatient(patientId) {
            window.location.href = 'edit_patient.php?id=' + patientId;
        }

        function deletePatient(patientId) {
            if (confirm("Are you sure you want to delete this patient?")) {
                window.location.href = 'delete_patient.php?id=' + patientId;
            }
        }
    </script>

</body>

</html>
