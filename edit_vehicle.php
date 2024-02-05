<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_GET['edit'])) {
    $VNO = $_GET['edit'];

    $query = "SELECT * FROM Vehicle_table_form WHERE VNO='$VNO'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $vehicleData = mysqli_fetch_assoc($result);
        $editVNO = $vehicleData['VNO'];
        $editVehicleType = $vehicleData['Vehicle_type'];
    } else {
        header('location: Vehicle Management.php?error=edit');
        exit();
    }
}

// Update
if (isset($_POST['update'])) {
    // Retrieve the form data
    $VNO = $_POST['VNO'];
    $Vehicle_type = $_POST['Vehicle_type'];

    // Update the vehicle record in the database
    $query = "UPDATE Vehicle_table_form SET Vehicle_type='$Vehicle_type' WHERE VNO='$VNO'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to vehicle management page with success message
        header('location: Vehicle Management.php?success=edit');
        exit();
    } else {
        // Redirect to vehicle management page with error message
        header('location: Vehicle Management.php?error=edit');
        exit();
    }
}





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Management (Edit)</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="sample.html">RIO Hotel Booking</a>
                <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            </div>
            <div class="pro">
                <img src="profile photo.png" alt="Profile photo">
            </div>
            <br>
            <br>
            <br>
            <ul class="navigation">
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'admin interface.php') echo 'class="active"'; ?>>
                    <a href="admin interface.php">Dashboard</a>
                </li>
                <li><a href="Hotel Management.php">Hotel Management</a></li>
                <li><a href="Vehicle Management.php">Vehicle Management</a></li>
                <li><a href="User Management.php">User Management</a></li>
                <li><a href="sample.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Edit Vehicle</h2>
           
            <form action="edit_vehicle.php" method="POST">
    <label for="VehicleID">Vehicle ID:</label>
    <input type="text" id="VNO" name="VNO" value="<?php echo $editVNO; ?>" ><br><br>

    <label for="Vehicle_dropdown">Vehicle Type:</label>
    <select name="Vehicle_type">
        <option value="Bike" <?php if ($editVehicleType == 'Bike') echo 'selected'; ?>>Bike</option>
        <option value="Car" <?php if ($editVehicleType == 'Car') echo 'selected'; ?>>Car</option>
        <option value="Van" <?php if ($editVehicleType == 'Van') echo 'selected'; ?>>Van</option>
        <option value="3 Wheel" <?php if ($editVehicleType == '3 Wheel') echo 'selected'; ?>>3 Wheel</option>
    </select>
    <br><br>
    <input type="submit" value="Update Vehicle" name="update">
</form>
