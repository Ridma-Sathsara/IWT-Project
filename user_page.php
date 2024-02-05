<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
<header>
        <nav>
          <div class="logo">
                <a href="sample.php">Hotel Booking</a>
          </div>
          <div class="pro">
          <a href="user profile/user profile/user_profile.php"> <button class="loginbtn">Profile</button></a>
              
              <img src="profile photo.png" alt="Profile photo">
            
          </div>
          
   
          
            <ul class="navigation">
                <li><a href="afterlogin/home_loged.php">Home</a></li>
                <li><a href="destinnation.php">Destinations</a></li>
                <li><a href="vehiclerental.php">Vehicle  Rentals</a></li>
                <li><a href="CDA/About us/About new.html">About us</a></li>
                <li><a href="#">Contact us</a></li>
               
            </ul>
        </nav>

    </header>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>