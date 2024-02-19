<?php
// Include database connection file
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $patientName = $_POST['p_name'];
    $hospitalId = $_POST['hospital_id'];
    $vaccineId = $_POST['vaccine_id'];
    $preferredDate = $_POST['date'];
    $preferredTime = $_POST['time'];

    // Insert data into tbl_appointment
    $insertQuery = "INSERT INTO tbl_appointment (p_name, h_id, a_date, a_time, v_id, a_status)
    VALUES (?, ?, ?, ?, ?, 'Pending')";
$stmt = $con->prepare($insertQuery);
$stmt->bind_param("sissi", $patientName, $hospitalId, $preferredDate, $preferredTime, $vaccineId);
    // Execute the statement
    if ($stmt->execute()) {
        // Display alert using JavaScript
        echo "<script>alert('Appointment booked successfully!'); window.location.href = 'appointment_form.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    // If the form is not submitted, redirect or handle accordingly
    echo "Form not submitted.";
}

// Assuming you have already sanitized and validated other form inputs
$selectedDate = $_POST['date'];

if (strtotime($selectedDate) < strtotime(date('Y-m-d'))) {
    // The selected date is in the past.
    // Handle this situation, perhaps redirect back to the form with an error message.
    header("Location: appointment_form.php?error=past_date");
    exit();
} else {
    // Proceed with inserting data into the database.
    // Perform your MySQL database insertion here.
    // ...
}
?>
