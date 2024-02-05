<?php
session_start();
@include 'config.php';

if (isset($_POST['submit'])) {
   // Update the staff member's details
   $staffmember_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
   $sname = mysqli_real_escape_string($conn, $_POST['name']);
   $hotel_name = mysqli_real_escape_string($conn, $_POST['hotel_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $update = "UPDATE Staff SET S_Name = '$sname', Hotel_name = '$hotel_name', Email = '$email' WHERE Staffmember_ID = '$staffmember_id'";
   mysqli_query($conn, $update);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Staff Member</title>
   <link rel="stylesheet" href="style.css">
   <style>
      /* Customized Confirmation Box Styles */
      .confirmation-overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .confirmation-box {
         background-color: #333;
         padding: 20px;
         border-radius: 4px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
         color: #fff;
         text-align: center;
      }

      .confirmation-buttons {
         display: flex;
         justify-content: center;
         margin-top: 20px;
      }

      .confirmation-buttons button {
         padding: 6px 12px;
         margin: 0 10px;
         border-radius: 4px;
         cursor: pointer;
         font-weight: bold;
         text-transform: uppercase;
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
         <h3>Edit Staff Member</h3>
         <input type="text" name="staff_id" required placeholder="Staff Member ID" value="<?php echo $row['Staffmember_ID']; ?>">
         <input type="text" name="name" required placeholder="Name" value="<?php echo $row['S_Name']; ?>">
         <input type="text" name="hotel_name" required placeholder="Hotel Name" value="<?php echo $row['Hotel_name']; ?>">
         <input type="email" name="email" required placeholder="Email" value="<?php echo $row['Email']; ?>">
         <input type="submit" name="submit" value="Update Member" class="form-btn">
          <!-- onclick="showConfirmationBox(event)"> -->
      </form>
   </div>

   <!-- Confirmation Overlay -->
   <div id="confirmationOverlay" class="confirmation-overlay">
      <div class="confirmation-box">
         <p>Are you sure you want to update this staff member?</p>
         <div class="confirmation-buttons">
            <button class="yes-btn" onclick="confirmUpdate()">Yes</button>
            <button class="no-btn" onclick="closeConfirmationBox()">No</button>
         </div>
      </div>
   </div>

   <script>
      function showConfirmationBox(event) {
         event.preventDefault();
         document.getElementById("confirmationOverlay").style.display = "flex";
      }

      function closeConfirmationBox() {
         document.getElementById("confirmationOverlay").style.display = "none";
         window.location.href = "Hmanager add staff.php";
      }

      function confirmUpdate() {
         document.getElementById("confirmationOverlay").style.display = "none";
         document.forms[0].submit();
      }
   </script>
</body>
</html>
