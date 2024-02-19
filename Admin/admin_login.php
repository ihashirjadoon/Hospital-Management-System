<?php
session_start();

// Include your database connection here
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the username and password match any record in tbl_admin
    $query = "SELECT * FROM tbl_admin WHERE a_email = '$username' AND a_password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the first row (assuming username/password are unique)
            $row = mysqli_fetch_assoc($result);

            // Set admin_id in session for future use
            $_SESSION['admin_id'] = $row['a_id'];

            // Redirect to the admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Incorrect username or password
            $error = "Incorrect username or password";
        }
    } else {
        // Database query error
        $error = "Error executing query: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add any necessary meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add the necessary styles or links to external stylesheets -->
    <style>
        /* Add any necessary styles or links to external stylesheets */
        @import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Saira Semi Condensed', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center; /* Center content horizontally */
            background: #f4f4f4; /* Set background color */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px; /* Increase padding for more space inside the container */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .login-container h2 {
            color: #333;
            margin-bottom: 20px; /* Add some margin below the heading for spacing */
        }

        .login-container form {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center form items horizontally */
        }

        .login-container input {
            width: 100%;
            padding: 12px; /* Increase padding for input fields */
            margin: 10px 0; /* Increase margin for input fields */
            box-sizing: border-box;
            border: 1px solid #ccc; /* Add a border to input fields */
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #2f4ad0; /* Match the theme color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on background-color */
        }

        .login-container button:hover {
            background-color: #1c328a; /* Change the background color on hover */
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
        .loginbtn a{
            text-decoration: none;
            color: #333  ;
        }
        .loginbtn a:hover{
            color: #1c328a;

        }

    </style>
    <title>Admin Login</title>
</head>

<body>
    <!-- Add your HTML content here -->
    <div class="login-container">
        <h2>Login to Admin Portal</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        // Display error message if any
        if (isset($error)) {
            echo '<p class="error-message">' . $error . '</p>';
        }
        ?>
    </div>
</body>

</html>
