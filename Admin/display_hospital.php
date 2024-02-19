<?php
// Include database connection file
include('connection.php');
include 'admin_header.php';
// Fetch data from tbl_hospital
$sql = "SELECT * FROM tbl_hospital";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Hospital List</title>
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
            background-color: #2f4ad0;
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
        .delete-button,
        .status-buttons {
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
        .activate-button,
.deactivate-button {
    margin: 0;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.activate-button {
    background-color: #4caf50;
    color: #fff;
}

.activate-button:hover {
    background-color: #45a049;
}

.deactivate-button {
    background-color: red;
    color: #fff;
}

.deactivate-button:hover {
    background-color: rgb(183, 10, 10);
}
    </style>
</head>

<body>
    <div class="container">
        <h1>Hospital List</h1>

        <!-- Display the hospital list as a styled table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='hospital-id'>" . $row['h_id'] . "</td>";
                        echo "<td>" . $row['h_name'] . "</td>";
                        echo "<td>" . $row['h_contact'] . "</td>";
                        echo "<td>" . $row['h_city'] . "</td>";
                        echo "<td>" . $row['h_email'] . "</td>";
                        echo "<td class='status-buttons'>";
                        if ($row['h_is_active'] == 1) {
                            echo "<button class='deactivate-button' onclick='updateHospitalStatus(" . $row['h_id'] . ", 0)'>Deactivated</button>";
                        } else {
                            echo "<button class='activate-button' onclick='updateHospitalStatus(" . $row['h_id'] . ", 1)'>Activated</button>";
                        }
                        echo "</td>";
                        echo "<td class='action-buttons'>";
                        echo "<button class='edit-button' onclick='editHospital(" . $row['h_id'] . ")'>Edit</button>";
                        echo "<button class='delete-button' onclick='deleteHospital(" . $row['h_id'] . ")'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function editHospital(hospitalId) {
        window.location.href = 'edit_hospital.php?id=' + hospitalId;
    }

    function deleteHospital(hospitalId) {
        if (confirm("Are you sure you want to delete this hospital?")) {
            window.location.href = 'delete_hospital.php?id=' + hospitalId;
        }
    }

    function updateHospitalStatus(hospitalId, status) {
        // Make an AJAX request to the server to update the status
        sendStatusUpdate(hospitalId, status);
    }

    function sendStatusUpdate(hospitalId, status) {
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure it: POST-request for the update_hospital_status.php file
        xhr.open("POST", "update_hospital_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Set up the data to be sent in the request body
        var data = "hospital_id=" + hospitalId + "&status=" + status;

        // Set up the callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response, e.g., display a message
                console.log(xhr.responseText);
                // You can update the UI here based on the response
                // Reload the page after updating status
                location.reload();
            }
        };

        // Send the request with the data
        xhr.send(data);
    }
</script>

</body>

</html>
