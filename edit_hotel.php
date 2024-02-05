<?php

@include 'config.php';
session_start();

// Checking admin is logged or not 
if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit();
}


if (isset($_GET['edit'])) {
    $hotelID = $_GET['edit'];

 
    $query = "SELECT * FROM hotel_table_form WHERE Hid='$hotelID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $hotelData = mysqli_fetch_assoc($result);
        $editHotelID = $hotelData['Hid'];
        $editHotelName = $hotelData['name'];
        $editDestination = $hotelData['destination'];
        $editAddress = $hotelData['address'];
        $editPhoneNumber = $hotelData['phone_number'];
    } else {
        
        header('location: Hotel Management.php?error=edit');
        exit();
    }


} 



else {

    header('location: Hotel Management.php');
    exit();
}


if (isset($_POST['update'])) {
    // Retrieve the form data
    $hotelID = $_POST['hotelID'];
    $hotelName = $_POST['hotelName'];
    $destination = $_POST['destination'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];

    // Updating hotel records
    $query = "UPDATE hotel_table_form SET name='$hotelName', destination='$destination', address='$address', phone_number='$phoneNumber' WHERE Hid='$hotelID'";
    $result = mysqli_query($conn, $query);
    if ($result) {
       
        header('location: Hotel Management.php?success=edit');
        exit();
    } else {
     
        header('location: Hotel Management.php?error=edit');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">



<style>
.edithotel{
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
                <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1> <!--print the admin name-->
            </div>
            <div class="pro">
                <img src="profile photo.png" alt="Profile photo">
            </div>
            <br>
            <br>
            <br>
            <ul class="navigation">
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'admin interface.php') echo 'class="active"'; ?>>
                <a href="admin interface.php">Dashboard</a></li>
                <li><a href="Hotel Management.php">Hotel Management</a></li>
                <li><a href="Vehicle Management.php">Vehicle Management</a></li>
                <li><a href="User Management.php">User Management</a></li>
                <li><a href="sample.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    

    <main>
        <section>
            <h2 class="edithotel">Edit Hotel</h2>
            <!-- Edit Hotel form -->
            <form action="" method="POST">
                <input type="hidden" name="hotelID" value="<?php echo $editHotelID; ?>">
                <label for="hotelName">Hotel Name:</label>
                <input type="text" id="hotelName" name="hotelName" value="<?php echo $editHotelName; ?>" required><br><br>

                <label for="destination">Destination:</label>
                <input type="text" id="destination" name="destination" value="<?php echo $editDestination; ?>" required><br><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $editAddress; ?>" required><br><br>

                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $editPhoneNumber; ?>" required><br><br>

                <input type="submit" name="update" value="Update">
            </form>
        </section>
    </main>

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
