<?php
// Include database connection file
include('connection.php');

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $hospitalId = $_POST['hospital_id'];
    $hospitalName = $_POST['h_name'];
    $hospitalContact = $_POST['h_contact'];
    $cityId = $_POST['h_city'];
    $hospitalEmail = $_POST['h_email'];
    $hospitalPassword = $_POST['h_password'];
    // Remove the following line, as the status is handled separately
    // $hospitalStatus = $_POST['h_status'];

    // Update data in tbl_hospital
    $updateQuery = "UPDATE tbl_hospital SET
                    h_name = '$hospitalName',
                    h_contact = '$hospitalContact',
                    h_city = '$cityId',
                    h_email = '$hospitalEmail',
                    h_password = '$hospitalPassword'
                    WHERE h_id = $hospitalId";

    if ($con->query($updateQuery) === TRUE) {
        echo "Hospital updated successfully!";
        // Redirect to the display page
        header("Location: display_hospital.php");
        exit(); // Ensure script stops here to prevent any further output
    } else {
        echo "Error updating hospital: " . $con->error;
    }
} else {
    echo "Invalid request. Please submit the form.";
}

// Close the database connection
$con->close();
?>
