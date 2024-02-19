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
    <link rel="stylesheet" href="your-css-file.css"> <!-- Include the link to your CSS file here -->
    <title>COVID Test Request Form</title>
    <style>
        /* Add any necessary styles or links to external stylesheets */
        @import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap');

        body {
            background: #dfdfdf;
            font-family: 'Saira Semi Condensed', sans-serif;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2f4ad0; /* Blue color */
     
        }

        form {
            display: flex;
            flex-direction: column;
        }


        .field {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            transition: background-color 0.3s ease;
        }

        input:focus {
            background: rgba(255, 255, 255, 1);
        }

        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            transition: background-color 0.3s ease;
        }

        select:focus {
            background: rgba(255, 255, 255, 1);
        }

        button {
            background: #2f4ad0;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background: #1c328a;
        }

        a {
            text-decoration: none;
            color: #2f4ad0;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="process_covid_test_request.php">
            <div class="field">
                <h2>Covid Test</h2>
                <label for="patient_name">Your Full Name</label>
                <input type="text" name="patient_name" readonly value="<?php echo $row['p_name']; ?>">
            </div>
          
            <div class="field">
                <label for="preferred_hospital">Preferred Hospital</label>
                <select name="preferred_hospital" required>
                    <?php
                    // Fetch hospitals from tbl_hospital
                    $hospitalQuery = "SELECT h_id, h_name FROM tbl_hospital";
                    $hospitalResult = $con->query($hospitalQuery);

                    // Populate dropdown with hospital options
                    while ($row = $hospitalResult->fetch_assoc()) {
                        echo "<option value='{$row['h_id']}'>{$row['h_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="field">
                <label for="preferred_date">Preferred Date</label>
                <input type="date" name="preferred_date" required>
            </div>
            <div class="field">
                <label for="preferred_time">Preferred Time</label>
                <input type="time" name="preferred_time" required>
            </div>

            <button type="submit" name="submit_request">Submit Request</button>
        </form>
    </div>
</body>

</html>
