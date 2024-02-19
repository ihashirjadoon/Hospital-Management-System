<?php
// Include database connection file
include('connection.php');

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if hospital_id and status are set
    if (isset($_POST['hospital_id']) && isset($_POST['status'])) {
        // Retrieve form data
        $hospitalId = $_POST['hospital_id'];
        $status = $_POST['status'];

        // Update data in tbl_hospital
        $updateQuery = "UPDATE tbl_hospital SET h_is_active = $status WHERE h_id = $hospitalId";

        // Perform the update
        if ($con->query($updateQuery) === TRUE) {
            echo "Hospital status updated successfully!";
        } else {
            echo "Error updating hospital status: " . $con->error;
        }
    } else {
        echo "Invalid request. Missing parameters.";
    }
} else {
    echo "Invalid request. Please submit the form using POST.";
}

// Close the database connection
$con->close();
?>
