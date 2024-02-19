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
      <title>News</title>
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
      <!--header section start -->
      <div class="header_section header_bg">
         <div class="container-fluid">
               <div class="main">
                  <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                  <div class="menu_text">
                     <ul>
                        <div class="togle_">
                           <div class="menu_main">
                              <ul>
                                 <li><a href="#">Login</a></li>
                                 <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div id="myNav" class="overlay">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                           <div class="overlay-content">
                              <a href="index.php">Home</a>
                              <a href="protect.php">Protect</a>
                              <a href="about.php">About</a>
                              <a href="doctors.php">Doctors</a>
                              <a href="news.php">News</a>
                           </div>
                        </div>
                        <span class="navbar-toggler-icon"></span>
                        <span onclick="openNav()"><img src="images/toogle-icon.png" class="toggle_menu"></span>
                        <span onclick="openNav()"><img src="images/toogle-icon1.png" class="toggle_menu_1"></span>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- banner section start -->
            <div class="container">
               <div class="about_taital_main">
                  <h2 class="about_tag">News Corona Virus</h2>
                  <div class="about_menu">
                     <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>News</li>
                     </ul>
                  </div>
               </div>
            </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- Hospital Reg Start -->

      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Style to make file input and checkbox look consistent */
        input[type="file"], input[type="checkbox"] {
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Hospital Registration Form</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        <!-- Hospital Information -->
        <label for="hospitalName">Hospital Name:</label>
        <input type="text" id="hospitalName" name="hospitalName" required>

        <!-- City -->
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <!-- Address -->
        <label for="hospitalAddress">Address:</label>
        <input type="text" id="hospitalAddress" name="hospitalAddress" required>

        <!-- Phone Number -->
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>

        <!-- Email Address -->
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <!-- Confirm Password -->
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <!-- Hospital Type -->
        <label for="hospitalType">Hospital Type:</label>
        <select id="hospitalType" name="hospitalType" required>
            <option value="government">Government</option>
            <option value="private">Private</option>
            <option value="non-profit">Non-profit</option>
        </select>

        <!-- Upload Hospital Image -->
        <label for="hospitalImage">Upload Hospital Image:</label>
        <input type="file" id="hospitalImage" name="hospitalImage">

        <!-- Agree to Terms -->
        <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
        <label for="agreeTerms">I agree to the terms and conditions</label>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>

</body>
</html>

      <!-- Hospital Reg End -->
            <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Resources</h2>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="#">What we do</a></li>
                           <li><a href="#">Media</a></li>
                           <li><a href="#">Travel Advice</a></li>
                           <li><a href="#">Protection</a></li>
                           <li><a href="#">Care</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">About</h2>
                     <p class="footer_text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various</p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Contact Us</h2>
                     <div class="location_text">
                        <ul>
                           <li>
                              <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                              <span class="padding_15">Location</span></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                              <span class="padding_15">Call +01 1234567890</span></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>
                              <span class="padding_15">demo@gmail.com</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">countrys</h2>
                     <div class="map_image"><img src="images/map-bg.png"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <p class="copyright_text">© 2020 All Rights Reserved.<a href="https://html.design"> Free  html Templates</a></p>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
              
         $(".zoom").hover(function(){
              
         $(this).addClass('transition');
         }, function(){
              
         $(this).removeClass('transition');
         });
         });
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>  
   </body>
</html>