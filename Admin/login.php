<?php
include("connection.php")
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
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
        background-color: #090909;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease; /* Smooth transition on background-color */
    }

    .login-container button:hover {
        background-color: grey; /* Change the background color on hover */
    }
   
</style>

</head>
<body>

    <img src="banner.jpg" alt="Background Image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">

    <div class="login-container">
        <h2>Admin Panel</h2>
        <form method="post">
            <input type="text" placeholder="Username" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" name="btnlogin">Login</button>
        </form>
    </div>
    
            <?php
            if(isset($_POST['btnlogin']))
            {
             $email = $_POST['email'];
             $password = $_POST['password'];
  
            $query = "SELECT * FROM tbl_admin WHERE email='$email' and 
            password= '$password'";
  
            $result = mysqli_query($con,$query);

            if(($result))
                {
                //   $row = mysqli_fetch_assoc ($result);
                //   $_SESSION['session'] = ($row)['id'];
                  
                  echo
                  "<script>
                   alert ('login successful');
                   window.location.href ='../index.php';
                  </script>";
                }
                else{
                    echo
                    "<script>
                      alert('incorrect email or password');
                    </script>"; 
                };

 
            };

          
            ?>


</body>
</html>
