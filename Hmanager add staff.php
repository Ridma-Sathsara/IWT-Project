<?php
@include 'config.php';

session_start();

// Submission
if (isset($_POST['submit'])) {
   $staffmember_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
   $sname = mysqli_real_escape_string($conn, $_POST['name']);
   $hotel_name = mysqli_real_escape_string($conn, $_POST['hotel_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $insert = "INSERT INTO Staff (Staffmember_ID, S_Name, Hotel_name, Email) VALUES ('$staffmember_id', '$sname', '$hotel_name', '$email')";
   mysqli_query($conn, $insert);

   header('location: Hmanager add staff.php');
   exit();
}

// Retrieve staff member details based on ID
if (isset($_GET['edit'])) {
   $edit_id = $_GET['edit'];
   $query = "SELECT * FROM Staff WHERE Staffmember_ID = '$edit_id'";
   $result = mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_query = "DELETE FROM Staff WHERE Staffmember_ID = '$delete_id'";
   mysqli_query($conn, $delete_query);

   header('location: Hmanager add staff.php');
   exit();
}

// Read data
$query = "SELECT * FROM Staff";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Hotel Manager</title>

   <link rel="stylesheet" href="style.css">

   <style>
      body {
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         font-size: 16px;
         color: #333;
      }

      h1,
      h3 {
         font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         font-size: 24px;
         color: #555;
      }

      table {
         border-collapse: collapse;
         width: 100%;
         margin-top: 20px;
      }

      th,
      td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      th {
         background-color: #f2f2f2;
      }

      .edit-btn,
      .delete-btn {
         padding: 6px 10px;
         background-color: #4CAF50;
         color: white;
         border: none;
         cursor: pointer;
      }

      .delete-btn {
         background-color: #f44336;
      }

      /* Customized Confirmation Box Styles */
      .confirmation-box {
         background-color: white;
         padding: 20px;
         border-radius: 4px;
      }

      .confirmation-buttons {
         display: flex;
         justify-content: flex-end;
         margin-top: 10px;
      }

      .confirmation-buttons button {
         padding: 6px 12px;
         margin-left: 10px;
         border-radius: 4px;
         cursor: pointer;
      }

      .yes-btn {
         background-color: red;
         color: white;
      }

      .no-btn {
         background-color: blue;
         color: white;
      }
   </style>
</head>
<body>
   <header>
      <nav>
         <div class="logo">
            <a href="sample.php">Hotel Booking</a>
         </div>
         <div class="pro">
            <a href="admin profile/admin profile/admin_profile.php">
               <button class="loginbtn">Profile</button>
            </a>
         </div>

         <ul class="navigation">
            <li><a href="hotelmanager_interface.php">Manager interface</a></li>
         </ul>
      </nav>
   </header>

   <div class="form-container">
      <form action="" method="post">
         <h3>Add Staff Member</h3>
         <input type="text" name="staff_id" required placeholder="Staff Member ID">
         <input type="text" name="name" required placeholder="Name">
         <input type="text" name="hotel_name" required placeholder="Hotel Name">
         <input type="email" name="email" required placeholder="Email">
         <input type="submit" name="submit" value="Add Member" class="form-btn">
      </form>
   </div>

   <h1>Details of Staff Members</h1>
   <table>
      <thead>
         <tr>
            <th>Staff Member ID</th>
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
            echo "<td>" . $row['Staffmember_ID'] . "</td>";
            echo "<td>" . $row['S_Name'] . "</td>";
            echo "<td>" . $row['Hotel_name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>";
            echo "<a href='edit_staff.php?edit=" . $row['Staffmember_ID'] . "' class='edit-btn'>Edit</a>";
            echo "<a href='Hmanager add staff.php?delete=" . $row['Staffmember_ID'] . "' class='delete-btn' onclick='return confirmDelete()'>Delete</a>";
            echo "</td>";
            echo "</tr>";
         }
         ?>
      </tbody>
   </table>

   <script>
      function confirmDelete() {
         var response = confirm("Are you sure you want to delete this staff member?");
         return response;
      }
   </script>
</body>
</html>
