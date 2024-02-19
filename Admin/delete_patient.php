<?php
// Include database connection file
include('connection.php');

// Check if it's a GET request and 'id' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $patientId = $_GET['id'];

    // Perform deletion in the database based on the patient ID using prepared statements
    $deleteSql = $con->prepare("DELETE FROM tbl_patients WHERE p_id = ?");
    $deleteSql->bind_param("i", $patientId);

    if ($deleteSql->execute()) {
        // Redirect or display success message
        header("Location: patients.php"); // Redirect to the patient list page or another appropriate page
        exit();
    } else {
        // Redirect or display error message
        echo "Error deleting patient: " . $deleteSql->error;
    }

    $deleteSql->close();
} else {
    // Redirect or handle error if 'id' parameter is not set
    echo "Patient ID not provided in the URL!";
}
?>
