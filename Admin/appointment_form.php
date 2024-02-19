<?php
include("connection.php");
session_start();

// Check if the user is not signed in, redirect to the sign-in page
if (!isset($_SESSION['patient_session'])) {
    header("Location: signin.php");
    exit();
}

// Fetch patient details from the session
$query = "SELECT * FROM tbl_patients WHERE p_id={$_SESSION['patient_session']}";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appointment Booking Form</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
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

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                margin-bottom: 8px;
            }

            select,
            input {
                margin-bottom: 16px;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
                width: 100%;
                box-sizing: border-box;
            }

            button {
                background-color: #2f4ad0;
                color: #fff;
                padding: 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #1c328a;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Book Your Appointment</h1>

            <!-- Appointment Booking Form -->
            <form action="process_appointment.php" method="post">
                <!-- Patient Name Input -->
                <label for="patient_name">Patient Name:</label>
                <input type="text" name="p_name" readonly value="<?php echo $row['p_name']; ?>" >

                <!-- Hospital Dropdown -->
                <label for="hospital_id">Select Hospital:</label>
                <select name="hospital_id" required>
                    <?php
                    // Fetch hospitals from tbl_hospital
                    // Replace this with your actual database query
                    $hospitalQuery = "SELECT h_id, h_name FROM tbl_hospital";
                    $hospitalResult = $con->query($hospitalQuery);

                    // Populate dropdown with hospital options
                    while ($row = $hospitalResult->fetch_assoc()) {
                        echo "<option value='{$row['h_id']}'>{$row['h_name']}</option>";
                    }
                    ?>
                </select>

                <!-- Vaccine Dropdown -->
                <label for="vaccine_id">Select Vaccine:</label>
                <select name="vaccine_id" required>
                    <?php
                    // Fetch vaccines from tbl_vaccine
                    // Replace this with your actual database query
                    $vaccineQuery = "SELECT v_id, v_name FROM tbl_vaccine";
                    $vaccineResult = $con->query($vaccineQuery);

                    // Populate dropdown with vaccine options
                    while ($row = $vaccineResult->fetch_assoc()) {
                        echo "<option value='{$row['v_id']}'>{$row['v_name']}</option>";
                    }
                    ?>
                </select>

                <!-- Date and Time Inputs -->
                <label for="date">Preferred Date:</label>
                <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>

                <label for="time">Preferred Time:</label>
                <input type="time" name="time" required>

                <!-- Submit Button -->
                <button type="submit">Book Appointment</button>
            </form>
        </div>
    </body>

    </html>
