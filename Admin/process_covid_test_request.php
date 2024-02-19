<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patient_name = $_POST["patient_name"];
    $preferred_hospital_id = $_POST["preferred_hospital"];
    $preferred_date = $_POST["preferred_date"];
    $preferred_time = $_POST["preferred_time"];

    // Insert data into tbl_covid_test_request
    $insertQuery = "INSERT INTO tbl_covid_test_request (patient_name, preferred_hospital_id, preferred_date, preferred_time, test_status)
                    VALUES (?, ?, ?, ?, 'Pending')";
    $stmt = $con->prepare($insertQuery);
    $stmt->bind_param("siss", $patient_name, $preferred_hospital_id, $preferred_date, $preferred_time);

    if ($stmt->execute()) {
        // Success message or redirect to confirmation page
        echo "<script>alert('Test request submitted successfully!'); window.location.href = 'covid_test_request_form.php';</script>";
    } else {
        // Display an error message or redirect to an error page
        echo "<script>alert('Error submitting test request.'); window.location.href = 'covid_test_request_form.php';</script>";
    }

    $stmt->close();
    $con->close();
} else {
    // If the form is not submitted, redirect or handle accordingly
    echo "Form not submitted.";
}
?>
