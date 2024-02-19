<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Convid</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
  
 <?php
   
 ?>
    
<?php

include('connection.php');

// Check if it's a POST request and the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    // Perform client-side validation
    if ($password != $confirmPassword) {
        echo "<script>alert('Error: Passwords do not match.');</script>";
    } else {
        // Insert data into tbl_patients
        $insertQuery = "INSERT INTO tbl_patients (p_name, p_contact, p_city, p_email, p_password) 
                        VALUES ('$name', '$contact', '$city', '$email', '$password')";

        // Perform the insertion
        if ($con->query($insertQuery) === TRUE) {
            echo "<script>alert('Patient registered successfully!');</script>";
            // You can redirect the user to a success page or perform any other action after registering
        } else {
            echo "<script>alert('Error registering patient: " . $con->error . "');</script>";
        }
    }

    // Close the database connection after processing the form
    $con->close();
}
?>


 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Patient</title>
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
        .login_a{color: #555;}
        .login_a,a{
            text-decoration: none;
            color: #555;
        }
     
       .login_a,a:hover{
        color: #1c328a;
       }
       
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="signup.php">
            <div class="field">
                <label for="name">Your Name</label>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="field">
                <label for="contact">Contact</label>
                <input type="text" name="contact" placeholder="Your contact number" required>
            </div>
            <div class="field">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="City" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <div class="field">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm Your Password" required>
            </div>
            <div class="login_a">
    <p>Already have an account? <a href="signin.php">Login</a></p>
</div>

<button type="submit" name="submit">Register</button>
</form>
</div>
</body>

</html>