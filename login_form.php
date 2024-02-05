<?php

@include 'config.php';

session_start();



$error = array();

// if(isset($_POST['submit'])){

//    $name = mysqli_real_escape_string($conn, $_POST['name']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $pass = md5($_POST['password']);
//    $cpass = md5($_POST['cpassword']);
//    $user_type = $_POST['user_type'];

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   // Check if email and password are provided
   if (empty($email)) {
      $error[] = 'Email is required.';
   }
   if (empty($pass)) {
      $error[] = 'Password is required.';
   }


   if (empty($error)) {

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

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
            
              <!-- <div class="buttons">

                <button class="loginbtn"><a href="login_form.php">Log in</a></button>
                <button class="signinbtn"><a href="register_form.php">Sign up</a></button>

              </div>  -->
              <img src="profile photo.png" alt="Profile photo">
            
          </div>
          
   
          
            <ul class="navigation">
                <li><a href="sample.php">Home</a></li>
                <li><a href="destinnation.php">Destinations</a></li>
                <li><a href="vehiclerental.php">Vehicle  Rentals</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
               
            </ul>
        </nav>

    </header>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">

      <input type="password" name="password" required placeholder="enter your password">

      <input type="submit" name="submit" value="login now" class="form-btn">

      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>