<?php
@include 'config.php';
session_start();

// Checking if admin is logged in or not
if (!isset($_SESSION['admin_name'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_GET['edit'])) {
    $manager_id = $_GET['edit'];

    $query = "SELECT * FROM Hotl_Manager WHERE Manager_ID='$manager_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $managerData = mysqli_fetch_assoc($result);
        $editManagerID = $managerData['Manager_ID'];
        $editName = $managerData['Name'];
        $editHotelName = $managerData['Hotel_Name'];
        $editEmail = $managerData['Email'];
    } else {
        header('location: addmin add hotelManager.php?error=edit');
        exit();
    }
} else {
    header('location: addmin add hotelManager.php');
    exit();
}

if (isset($_POST['update'])) {
    // Retrieve the form data
    $managerID = $_POST['managerID'];
    $name = $_POST['name'];
    $hotelName = $_POST['hotelName'];
    $email = $_POST['email'];

    // Updating manager records
    $query = "UPDATE Hotl_Manager SET Name='$name', Hotel_Name='$hotelName', Email='$email' WHERE Manager_ID='$managerID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: addmin add hotelManager.php?success=edit');
        exit();
    } else {
        header('location: addmin add hotelManager.php?error=edit');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Edit Hotel Manager</title>
   <link rel="stylesheet" type="text/css" href="style.css">

   <style>

.editmanager{
font-family: Georgia, 'Times New Roman', Times, serif;


}

.edit-form {
    max-width: 400px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

input[type="submit"]:hover {
    background-color: #45a049;
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


        </style>
</head>
<body>
   <header>
      <nav>
         <div class="logo">
            <a href="sample.php">Hotel Booking</a>
            <h1>welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
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
            <li><a href="User Management.php">User Management</a></li>
            <li><a href="sample.php">Logout</a></li>
         </ul>
      </nav>



   </header>
<br>
   <main>
      <section>
         <h2 class="editmanager">Edit Hotel Manager</h2>
         <!-- Edit Manager form -->
         <form action="" method="POST">
            <input type="hidden" name="managerID" value="<?php echo $editManagerID; ?>">
            <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" value="<?php echo $editName; ?>" required>
            </div>
            <div class="form-group">
               <label for="hotelName">Hotel Name:</label>
               <input type="text" id="hotelName" name="hotelName" value="<?php echo $editHotelName; ?>" required>
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="text" id="email" name="email" value="<?php echo $editEmail; ?>" required>
            </div>
            <input type="submit" name="update" value="Update">
         </form>
      </section>
   </main>
<br>
   <footer>
      <div class="footer-content1">
         <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
         <ul class="footer-links1">
            <li><a href="terms.html">Terms of Service</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="contact.html">Contact Us</a></li>
         </ul>
      </div>
   </footer>
</body>
</html>
