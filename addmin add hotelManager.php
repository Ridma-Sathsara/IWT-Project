<?php
@include 'config.php';

session_start();


if(!isset($_SESSION['admin_name'])){
   header('location: login_form.php');
   exit();
}

//  submission
if(isset($_POST['submit'])){
   $manager_id = mysqli_real_escape_string($conn, $_POST['manager_id']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $hotel_name = mysqli_real_escape_string($conn, $_POST['hotel_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

  
   $insert = "INSERT INTO Hotl_Manager (Manager_ID, Name, Hotel_Name, Email) VALUES ('$manager_id', '$name', '$hotel_name', '$email')";
   mysqli_query($conn, $insert);

   
   header('location:addmin add hotelManager.php');
   exit();
}
// Delete functionality
if (isset($_GET['delete'])) {
   $managerID = $_GET['delete'];

   $deleteQuery = "DELETE FROM Hotl_Manager WHERE Manager_ID='$managerID'";
   $deleteResult = mysqli_query($conn, $deleteQuery);

   if ($deleteResult) {

      
      header('location: addmin add hotelManager.php?success=3');
      exit();
   } else {

      
      header('location: addmin add hotelManager.php?error=3');
      exit();
   }
}

$query = "SELECT * FROM Hotl_Manager";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Hotel Manager</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   
<style>

body {
         font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         font-size: 16px;
         color: #333;
      }
      h1, h3 {
         font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         font-size: 24px;
         color: #555;
      }
      table {
         border-collapse: collapse;
         width: 100%;
         margin-top: 20px;
      }
      th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }
      th {
         background-color: #f2f2f2;
      }
      .edit-btn,
        .delete-btn{
            background-color: #f44336;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
            font-family: 'Times New Roman', Times, serif;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #d32f2f;
        }





   </style>

</head>
<body>
   <header>
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
                <!-- <li><a href="afterlogin/home_loged.php">Home</a></li> -->
                <!-- <li><a href="destinnation.php">Destinations</a></li>
                <li><a href="vehiclerental.php">Vehicle  Rentals</a></li> -->
                <li><a href="admin interface.php">Admin interface</a></li>
               
               
            </ul>
        </nav>

    </header>
   
   </header>
   
   <div class="form-container">
      <form action="addmin add hotelManager.php" method="post">
         <h3>Add Hotel Manager</h3>
         <input type="text" name="manager_id" required placeholder="Manager ID">
         <input type="text" name="name" required placeholder="Manager Name">
         <input type="text" name="hotel_name" required placeholder="Hotel Name">
         <input type="email" name="email" required placeholder="Email">
         <input type="submit" name="submit" value="Add Manager" class="form-btn">
      </form>
   </div>



   <H1 > Details of Hotel Managers</H1>
   <table>
      <thead>
         <tr>
            <th>Manager ID</th>
            <th>Name</th>
            <th>Hotel Name</th>
            <th>Email</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         // Iterate over the result set and display the manager details in the table
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Manager_ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Hotel_Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>";


            echo '<a class="edit-btn" href="edit_manager.php?edit=' . $row['Manager_ID'] . '">Edit</a>';
            echo '<a class="delete-btn" href="addmin add hotelManager.php?delete=' . $row['Manager_ID'] . '">Delete</a>';
           
            echo "</td>";
            echo "</tr>";
         }
         ?>
      </tbody>
   </table>
   <!-- Footer -->
</body>
</html>
