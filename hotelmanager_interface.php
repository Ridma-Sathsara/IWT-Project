<?php

session_start();

@include 'config.php';

// Retrieve the submitted form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST["email"];
  
   // Query to check if the manager credentials are valid
   $query = "SELECT * FROM hotl_manager WHERE Email = '$email'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {
       // Manager credentials are valid, create a session and redirect to the manager dashboard
       $manager = mysqli_fetch_assoc($result);
    //    $_SESSION['manager_id'] = $manager['Manager_ID'];
    //    $_SESSION['manager_name'] = $manager['Name'];
       header("Location: hotelmanager_interface.php");
       exit();
   } else {
       // Manager credentials are invalid, display an error message
       $error = "Invalid credentials. Please try again.";
   }
}



mysqli_close($conn); // Close the connection
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">

<style>

.topic{
    text-align: center;
    font-size: 34px;
    color: #212F3D;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}



.Adminname{

    font-size: 34px;
    color: greenyellow;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}




footer {
    background-color: #036956;
    padding: 20px 0;
    text-align: center;
}

.footer-content1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.footer-content1 p {
    flex: 1;
    margin: 0;
    font-size: 14px;
    color: #777;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.footer-links1 {
    flex: 1;
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer-links1 li {
    margin: 0 10px;
}

.footer-links1 li a {
    text-decoration: none;
    color: #777;
    font-size: 14px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.footer-links1 li a:hover {
    color: #fff;
}

.fter{
    text-align: center;
    text-decoration: none;
    color: #212F3D;
    font-size: 14px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}


</style>


  
</head>


<body>
    <header>
        <nav>
          
          <div class="logo">
                <a href="sample.php">Hotel Booking</a>
               
                <h1 class="Adminname">welcome  </h1>
            
          </div>
         
          <div class="pro">
            
            
              <img src="profile photo.png" alt="Profile photo">
            
          </div>
          <br>
          <br>
          <br>
            <ul class="navigation">
                <li><a href="hotelmanager_interface.php">Dashboard</a></li>
            
            
            <li><a href="">Booking Management</a></li>
            <li><a href="Hmanager add staff.php">Staff Management</a></li>
            
            <li><a href="afterlogin/hotelmanager_homepage.php">Home Page</a></li>
            <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>

        
    </header>
   


    <br> <br> <br>
        
            <div class="fter">
            <p>Here you can manage hotels, vehicles,  and user accounts.</p>
            </div>


        <br> <br> <br> <br>
    </main>

    <footer>
    <div class="footer-content1">
        <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
        <ul class="footer-links1">
            
            <li><a href="CDA/About us/About new.html">About Us</a></li>
        </ul>
    </div>
    </footer>
</body>
</html>
