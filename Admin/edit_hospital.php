<?php
// Include database connection file
include('connection.php');

// Check if the hospital ID is provided in the URL
if(isset($_GET['id'])) {
    $hospitalId = $_GET['id'];

    // Fetch hospital data based on the ID
    $sql = "SELECT * FROM tbl_hospital WHERE h_id = $hospitalId";
    $result = $con->query($sql); if ($result->num_rows > 0) { $row =
$result->fetch_assoc(); // Display the form with pre-filled data ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Edit Hospital</title>
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
        text-align: center;
      }

      label {
        display: block;
        margin-bottom: 8px;
        color: #333;
      }

      input,
      select {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
      }

      button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Edit Hospital</h1>

      <!-- Form for editing hospital details -->
      <form method="post" action="update_hospital.php">
        <input
          type="hidden"
          name="hospital_id"
          value="<?php echo $row['h_id']; ?>"
        />

        <label for="h_name">Hospital Name:</label>
        <input
          type="text"
          name="h_name"
          value="<?php echo $row['h_name']; ?>"
          required
        />

        <label for="h_contact">Hospital Contact:</label>
        <input
          type="text"
          name="h_contact"
          value="<?php echo $row['h_contact']; ?>"
          required
        />

        <label for="h_city">City:</label>
        <input
          type="text"
          name="h_city"
          value="<?php echo $row['h_city']; ?>"
          required
        />

        <label for="h_email">Hospital Email:</label>
        <input
          type="email"
          name="h_email"
          value="<?php echo $row['h_email']; ?>"
          required
        />

        <label for="h_password">Hospital Password:</label>
        <input
          type="password"
          name="h_password"
          value="<?php echo $row['h_password']; ?>"
          required
        />

        <button type="submit" name="submit">Update Hospital</button>
      </form>
    </div>
  </body>
</html>

<?php
    } else {
        echo "Hospital not found.";
    }
} else {
    echo "Hospital ID not provided.";
}
?>
