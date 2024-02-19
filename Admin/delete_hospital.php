<?php
include('connection.php');

if(isset($_GET['id'])) {
    $hospitalId = $_GET['id'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM tbl_hospital WHERE h_id = $hospitalId";

    if ($con->query($deleteQuery) === TRUE) {
        echo "Hospital deleted successfully!";
    } else {
        echo "Error deleting hospital: " . $con->error;
    }

    // Redirect back to the display page
    header("Location: display_hospital.php");
} else {
    echo "Hospital ID not provided.";
}

$con->close();
?>
