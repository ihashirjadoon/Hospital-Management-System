<?php
// Include database connection file
include('../connection.php');
session_start();

// Function to handle file upload
function handleFileUpload($test_request_id)
{
    // Specify the folder where you want to store the uploaded files
    $uploadFolder = '../hospital/result/';

    // Check if the file is uploaded successfully
    if ($_FILES['result_file']['error'][0] == UPLOAD_ERR_OK) {
        $tempName = $_FILES['result_file']['tmp_name'][0];
        $fileName = $test_request_id . '_' . $_FILES['result_file']['name'][0];
        $filePath = $uploadFolder . $fileName;

        // Move the file to the designated folder
        if (move_uploaded_file($tempName, $filePath)) {
            // Return the file path to be stored in the database
            return $filePath;
        } else {
            // Handle the case where moving the file failed
            return '';
        }
    } else {
        // Handle the case where the file upload failed
        return '';
    }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='Cache-Control' content='no-cache, no-store, must-revalidate'>
    <meta http-equiv='Pragma' content='no-cache'>
    <meta http-equiv='Expires' content='0'>
    <title>Covid Test Appointments</title>
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
        padding: 18px; /* Increase padding for vertical size */
        text-align: left; /* Align text to the left */
        position: relative;
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


    .logout-link {
        position: absolute;
        top: 20px;
        right: 80px; /* Adjust the right margin as needed */
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    .logout-link:hover {
        text-decoration: underline;
    }

    .container {
        max-width: 1010px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    h1 {
        text-align: center;
        color: #fff;
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

    .file-input-container {
        display: none;
    }

    input[type="file"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        margin-top: 5px;
        transition: background-color 0.3s ease;
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
</style>

</head>

<body>
<div class="header">
  <h1>Vaccine Appointments</h1>
    <!-- Add a link to the dashboard in the top right corner -->
    <a href="dashboard.php" class="dashboard-link">Portal</a>
</div>
    <div class='container'>
        <!-- Display the test appointments list as a styled table -->
        <form method='post' action='' enctype='multipart/form-data'>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Get an array of test request IDs and corresponding new statuses from the form
                        $test_request_ids = isset($_POST['test_request_id']) ? $_POST['test_request_id'] : [];

                        // Ensure $test_request_ids is an array
                        if (is_array($test_request_ids)) {
                            // Iterate through the array and update statuses in the database
                            foreach ($test_request_ids as $index => $test_request_id) {
                                // Set the new status to the selected option from the form
                                $new_status = isset($_POST['new_status'][$index]) ? $_POST['new_status'][$index] : '';

                                // Update the status and result_file in the database
                                $updateQuery = "UPDATE tbl_covid_test_request SET test_status = ?, result_file = ? WHERE test_request_id = ? AND preferred_hospital_id = ?";
                                $updateStatement = $con->prepare($updateQuery);

                                // If the status is 'completed', handle file upload
                                if ($new_status == 'completed') {
                                    $result_file_path = handleFileUpload($test_request_id);
                                } else {
                                    $result_file_path = ''; // Set to an empty string if the status is not 'completed'
                                }

                                $updateStatement->bind_param("ssii", $new_status, $result_file_path, $test_request_id, $_SESSION['hospital_id']);

                                if ($updateStatement->execute()) {
                                    echo "<script>alert('Status updated successfully!'); window.location.href='covid_test_appointments.php';</script>";
                                } else {
                                    echo "Error updating status: " . $updateStatement->error;
                                }

                                // Close the prepared statement
                                $updateStatement->close();
                            }
                        } else {
                            // Handle the case where $test_request_ids is not an array
                            echo "Error: Test Request IDs should be an array.";
                        }
                    }

                    // Fetch data from tbl_covid_test_request using a prepared statement
                    $sql = "SELECT test_request_id, patient_name, preferred_date, preferred_time, test_status, result_file
                            FROM tbl_covid_test_request
                            WHERE preferred_hospital_id = ?";
                    $result = $con->prepare($sql);
                    $result->bind_param("i", $_SESSION['hospital_id']);
                    $result->execute();
                    $result->store_result();

                    // Check if there are rows in the result set
                    if ($result->num_rows > 0) {
                        $result->bind_result($test_request_id, $patient_name, $preferred_date, $preferred_time, $test_status, $result_file_path);

                        // Display the test appointments list as a styled table
                        while ($result->fetch()) {
                            echo "<tr>";
                            echo "<td class='test-request-id'>" . $test_request_id . "</td>";
                            echo "<td>" . $patient_name . "</td>";
                            echo "<td>" . $preferred_date . "</td>";
                            echo "<td>" . $preferred_time . "</td>";
                            echo "<td>";
                            echo "<select name='new_status[]'>";
                            echo "<option value='pending' " . ($test_status == 'pending' ? 'selected' : '') . ">Pending</option>";
                            echo "<option value='approved' " . ($test_status == 'approved' ? 'selected' : '') . ">Approved</option>";
                            echo "<option value='canceled' " . ($test_status == 'canceled' ? 'selected' : '') . ">Canceled</option>";
                            echo "<option value='completed' " . ($test_status == 'completed' ? 'selected' : '') . ">Completed</option>";
                            echo "</select>";

                            // Add a file input for 'completed' status
                            echo "<input type='file' name='result_file[]'>";

                            // Add a hidden input field for each test request ID
                            echo "<input type='hidden' name='test_request_id[]' value='$test_request_id'>";
                            echo "</td>";
                            echo "<td>";

                            // Display the result file path if it exists
                            if (!empty($result_file_path)) {
                                echo "<a href='$result_file_path' target='_blank'>View Result</a>";
                            } else {
                                echo "N/A";
                            }

                            echo "</td>";
                            echo "</tr>";
                        }
                        $result->close();
                    } else {
                        echo "No records found.";
                    }
                    ?>
                </tbody>
            </table>
            <input type='submit' value='Update Status'>
        </form>
    </div>
</body>

</html>
