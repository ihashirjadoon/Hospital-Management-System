<?php
// Include database connection file
include('connection.php');

// Check if the patient ID is provided in the URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $patientId = $_GET['id'];

    // Fetch patient details from the database
    $sql = "SELECT * FROM tbl_patients WHERE p_id = ?";
    $result = $con->prepare($sql);
    $result->bind_param("i", $patientId);
    $result->execute();
    $result->store_result();

    if ($result->num_rows > 0) {
        $result->bind_result($p_id, $p_name, $p_contact, $p_city, $p_email);
        $result->fetch();

        // Check if the form is submitted for updating patient details
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve updated data from the form
            $updatedName = $_POST['updated_name'];
            $updatedContact = $_POST['updated_contact'];
            $updatedCity = $_POST['updated_city'];
            $updatedEmail = $_POST['updated_email'];

            // Update patient details in the database
            $updateSql = $con->prepare("UPDATE tbl_patients SET 
                              p_name = ?,
                              p_contact = ?,
                              p_city = ?,
                              p_email = ?
                              WHERE p_id = ?");
            $updateSql->bind_param("ssssi", $updatedName, $updatedContact, $updatedCity, $updatedEmail, $patientId);

            if ($updateSql->execute()) {
                header("Location:patients.php");
                exit();
            } else {
                echo "Error updating patient details: " . $updateSql->error;
            }

            $updateSql->close();
        }
    } else {
        echo "Patient not found!";
    }

    $result->close();
} else {
    echo "Patient ID not provided in the URL!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Patient</title>
    <style>
     body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
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
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #008CBA;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005684;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Patient</h1>

        <!-- Display the edit form -->
        <form method="post">
            <label for="updated_name">Name:</label>
            <input type="text" id="updated_name" name="updated_name" value="<?php echo $p_name; ?>" required>

            <label for="updated_contact">Contact:</label>
            <input type="text" id="updated_contact" name="updated_contact" value="<?php echo $p_contact; ?>" required>

            <label for="updated_city">City:</label>
            <input type="text" id="updated_city" name="updated_city" value="<?php echo $p_city; ?>">

            <label for="updated_email">Email:</label>
            <input type="email" id="updated_email" name="updated_email" value="<?php echo $p_email; ?>">

            <button type="submit">Update Patient</button>
        </form>
    </div>
</body>

</html>
