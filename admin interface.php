<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

$conn = mysqli_connect('localhost', 'root', '', 'hotel_resourses');
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Query to get the count of users
$query = "SELECT COUNT(*) AS total_users FROM user_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0; 
}





$query = "SELECT COUNT(*) AS total_hotels FROM hotel_table_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalhotels = $row['total_hotels'];
} else {
    $totalhotels = 0; 
}

//get the total number of vehicles
$query = "SELECT COUNT(*) AS total_vehicles FROM Vehicle_table_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalVehicles = $row['total_vehicles'];
} else {
    $totalVehicles = 0; 
}


mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
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
    color: #777;
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
                <h1 class="Adminname">welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1> <!--print the admin name-->
          </div>
          <div class="pro">
            
            
              <img src="profile photo.png" alt="Profile photo">
            
          </div>
          <br>
          <br>
          <br>
            <ul class="navigation">
                <li><a href="admin interface.php">Dashboard</a></li>
            <li><a href="Hotel Management.php">Hotel Management</a></li>
            <li><a href="Vehicle Management.php">Vehicle Management</a></li>
            <!-- <li><a href="booking-management.php">Booking Management</a></li> -->
            <li><a href="User Management.php">User Management</a></li>
            <li><a href="addmin add hotelManager.php">Add Hotel Manager</a></li>
            <li><a href="afterlogin/admin_link_to_homepage.php">Home Page</a></li>
            <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>

        
    </header>
    <main><br>
          <br>
          <br>
        <section>
            <h2 class="topic">Overview/Summary</h2>

            <br>
            <br>
            <br>
            <div class="summary-card">
                <div class="card">
                    <h3 >Total Hotels
                        <br> <?php echo $totalhotels; ?>
                    </h3>
                   
                </div>
                <div class="card">
                    <h3>Total Vehicles
                        <br> <?php echo  $totalVehicles; ?></h3>
                   
                </div>
                
                <div class="card">
                    <h3>Total Users
                    <br><?php echo $totalUsers; ?> </h3>
                    
                </div>
            </div>
        </section>
    </main>
    
    <main>
       


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
