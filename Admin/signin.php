<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <!-- Add any necessary styles or links to external stylesheets -->
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
        a{
            text-decoration: none;
            color: #2f4ad0;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="signin.php">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>

            <button type="submit" name="btnlogin">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  <?php
  if(isset($_POST['btnlogin']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM tbl_patients WHERE p_email = '$email' and p_password = '$password'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)> 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['patient_session'] = $row['p_id'];
        $_SESSION['patient_name'] = $row['p_name'];

        echo"<script>
        alert('Login successful');
        window.location.href = '../index.php';
        </script>";
    }
    else {
        echo"<script>
        alert('Incorrect email or password');
       
        </script>";
    }
  }
  
  ?>
  
</body>

</html>