<?php
@include 'config.php';

// Retrieve the submitted form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST["email"];
  
   // Query to check if the manager credentials are valid
   $query = "SELECT * FROM hotl_manager WHERE Email = '$email'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {
       // Manager credentials are valid, redirect to the manager dashboard
       header("Location: hotelmanager_interface.php");
       exit();
   } else {
       // Manager credentials are invalid, display an error message
       echo "Invalid credentials. Please try again.";
   }
}

mysqli_close($conn); // Close the connection

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Manager Login</title>

   <style>
      body {
         background-color: #212121;
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;
         font-family: 'Courier New', monospace;
         color: #fff;
      }

      .form-container {
         max-width: 400px;
         padding: 40px;
         border: 2px solid #fff;
         border-radius: 10px;
         background-color: #333;
         box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
      }

      h1 {
         text-align: center;
         font-size: 30px;
         margin-bottom: 30px;
      }

      .form-container input[type="email"],
      .form-container input[type="submit"] {
         width: 100%;
         padding: 10px;
         margin-bottom: 20px;
         border: none;
         border-radius: 5px;
         background-color: #555;
         color: #fff;
         font-size: 16px;
      }

      .form-container input[type="email"] {
         padding: 15px;
      }

      .form-container input[type="submit"] {
         padding: 12px;
         cursor: pointer;
         background-color: #4CAF50;
         transition: background-color 0.3s ease;
      }

      .form-container input[type="submit"]:hover {
         background-color: #45a049;
      }
   </style>
</head>
<body>
<div class="form-container">
      <h1>Hotel Manager Login</h1>
      
      <form action="" method="post">
         <input type="email" name="email" placeholder="Email" required>

         <input type="submit" name="submit" value="Login">
      </form>
      <?php if (isset($error)) : ?>
         <p class="error-message"><?php echo $error; ?></p>
      <?php endif; ?>
   </div>
</body>
</html>
