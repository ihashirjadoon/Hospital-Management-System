<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="../css/style.css">
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
    <style>
     .menu_text ul {
         display: flex;
         align-items: center;
         /* Align items vertically in the center */
     }
 </style>
</head>
<body>    

 <!--header section start -->
 <div class="header_section">
     <div class="container-fluid">
         <div class="main">
             <div class="logo"><a href="../index.php"><img src="./images/logo.png"></a></div>
             <div class="menu_text">
                 <ul>
                     <div class="togle_">
                         <div class="menu_main">
                             <ul>

                                 <?php
                                    session_start();
                                    if (isset($_SESSION['patient_session'])) {
                                        echo "<li><a href='admin/user_profile.php'>{$_SESSION['patient_name']}</a></li>";
                                        
                                        // echo "<li><a href='admin/signout.php'>Logout</a></li>";
                                    } else {
                                        echo "<li><a href='admin/signin.php'>Login</a></li>";
                                    }
                                    ?>

                             </ul>
                         </div>
                     </div>
                     <div id="myNav" class="overlay">
                         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                         <div class="overlay-content">
                             <a href="./index.php">Home</a>
                             <a href="./protect.php">Protect</a>
                             <a href="./about.php">About</a>
                             <a href="./doctors.php">Doctors</a>
                             <a href="admin/admin_login.php">Admin login</a>
                             <a href="../appointify/hospital/login.php">Hospital Login</a>
                             <!-- <a href='admin/signout.php'>Logout</a> -->
                             <?php
                                    
                                    if (isset($_SESSION['patient_session'])) {
                                    
                                        echo "<li><a href='admin/appointment_form.php'>Get Vaccinated</a></li>";
                                        echo "<li><a href='admin/covid_test_request_form.php'>Covid Test</a></li>";
                                        echo "<li><a href='admin/my_appointments.php'>My Appointments</a></li>";
                                        echo "<li><a href='admin/signout.php'>Logout</a></li>";
                                    
                                    } else {
                                
                                        
                                    }
                                    ?>
                            
                             <!-- <a href="register_hospital.php">Register Your Hospital</a> -->
                             <!-- <a href="../news.php">News</a> -->
                         </div>
                     </div>
                     <span class="navbar-toggler-icon"></span>
                     <span onclick="openNav()"><img src="./images/toogle-icon.png" class="toggle_menu"></span>
                     <span onclick="openNav()"><img src="./images/toogle-icon1.png" class="toggle_menu_1"></span>
                 </ul>
             </div>
         </div>
     </div>
     </body>
</html>