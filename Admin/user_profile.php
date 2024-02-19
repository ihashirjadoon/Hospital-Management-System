<?php
include("header.php");
include("connection.php");
if (!isset($_SESSION['patient_session'])) {
    echo
    "<script>
    window.location.href='signin.php'
    </script>";
}
$query = "SELECT * FROM tbl_patients WHERE p_id=$_SESSION[patient_session]";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$_SESSION['patient_name'] = $row['p_name'];

?>

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
   <link rel="stylesheet" href="../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="../css/owl.carousel.min.css">
   <link rel="stylesheet" href="../css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<style>
    /* Add any necessary styles or links to external stylesheets */
    @import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap');

    body {
        background: #dfdfdf;
        font-family: 'Saira Semi Condensed', sans-serif;
        margin: 0;
    }

    .mainContent {
        display: flex;
        justify-content: space-between;
        max-width: 800px;
        margin: 50px auto;
    }

    .leftSide {
        flex: 1;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .leftSide h2 {
        margin-bottom: 20px;
        color: #2f4ad0;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        margin-bottom: 16px;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        transition: background-color 0.3s ease;
    }

    input:focus {
        background: rgba(255, 255, 255, 1);
    }

    button {
        background-color: #2f4ad0;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #1c328a;
    }
</style>



<body>
    <div class="mainContent">
        <div class="leftSide">
            <h2>My Profile</h2>
            <form method="post">
                <label for="name">Name:</label>
                <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $row['p_name']; ?>">

                <label for="phone">Contact Number:</label>
                <input type="text" placeholder="Enter Your Contact Number" name="phone" value="<?php echo $row['p_contact']; ?>">

                <label for="city">City:</label>
                <input type="text" placeholder="Enter Your City" name="city" value="<?php echo $row['p_city']; ?>">

                <label for="email">Email:</label>
                <input type="text" placeholder="Enter Your Email" name="email" value="<?php echo $row['p_email']; ?>">

                <label for="password">Password:</label>
                <input type="text" placeholder="Enter Your Password" name="password" value="<?php echo $row['p_password']; ?>">


                <button type="submit" name="btnupdate">Update Profile</button>
            </form>
            <?php
            if (isset($_POST['btnupdate'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $query = "UPDATE tbl_patients SET p_name='$name', p_contact='$phone', p_city='$city', p_email='$email', p_password='$password' WHERE p_id=$_SESSION[patient_session]";

                $result = mysqli_query($con, $query);
                if ($result) {
                    echo
                    "<script>
                    alert('Profile Updated Successfully'); 
                    window.location.href='../index.php'
                    </script>";
                }
            }
            ?>
        </div>
        <div class="rightSide"></div>
    </div>
</body>

</html>