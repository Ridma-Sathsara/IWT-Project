<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   
   <link rel="stylesheet" href="style.css">

</head>
<body>
<header>
        <nav>
          <div class="logo">
                <a href="sample.php">Hotel Booking</a>
          </div>
          <div class="pro">
          <a href="admin profile/admin profile/admin_profile.php"> <button class="loginbtn">Profile</button></a>
              
           <!-- <a href="admin profile/admin profile/admin_profile.php">   <img src="profile photo.png" alt="Profile photo"> </a> -->
            
          </div>
         
            <ul class="navigation">
                <li><a href="afterlogin/admin_link_to_homepage.php">Home</a></li>
                <li><a href="destinnation.php">Destinations</a></li>
                <li><a href="vehiclerental.php">Vehicle  Rentals</a></li>
                <li><a href="admin interface.php">Admin interface</a></li>
               
               
            </ul>
        </nav>

    </header>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      
      <a href="sample.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>