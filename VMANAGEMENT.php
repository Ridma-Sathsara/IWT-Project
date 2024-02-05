<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $vehicleNumber = $_POST['vehicleNumber'];
    $vehicleType = $_POST['vehicleType'];

    // Insert the form data into the database
    $query = "INSERT INTO vehicle_table (vehicle_number, vehicle_type)
              VALUES ('$vehicleNumber', '$vehicleType')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect with a success message
        header('location: VehicleManagement.php?success=1');
        exit();
    } else {
        // Redirect with an error message
        header('location: VehicleManagement.php?error=1');
        exit();
    }
}

if (isset($_POST['update'])) {
    // Retrieve the form data
    $vehicleID = $_POST['vehicleID'];
    $vehicleNumber = $_POST['vehicleNumber'];
    $vehicleType = $_POST['vehicleType'];

    // Update the vehicle data in the database
    $query = "UPDATE vehicle_table SET vehicle_number='$vehicleNumber', vehicle_type='$vehicleType' WHERE vehicle_id='$vehicleID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect with a success message
        header('location: VehicleManagement.php?success=2');
        exit();
    } else {
        // Redirect with an error message
        header('location: VehicleManagement.php?error=2');
        exit();
    }
}

if (isset($_GET['delete'])) {
    $vehicleID = $_GET['delete'];

    // Delete the vehicle from the database
    $query = "DELETE FROM vehicle_table WHERE vehicle_id='$vehicleID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect with a success message
        header('location: VehicleManagement.php?success=3');
        exit();
    } else {
        // Redirect with an error message
        header('location: VehicleManagement.php?error=3');
        exit();
    }
}

$query = "SELECT COUNT(*) AS total_vehicles FROM vehicle_table";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalVehicles = $row['total_vehicles'];
} else {
    $totalVehicles = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Management</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3c7261;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .summary-card {
            display: flex;
            flex-wrap: wrap;
        }

        .vehi {
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: #000080;
        }

        .card {
            background-color: #f2f2f2;
            padding: 20px;
            margin: 10px;
            flex-basis: 200px;
            text-align: center;
        }

        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            height: 100vh;
        }

        .card h3 {
            margin-top: 0;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .edit-btn,
        .delete-btn {
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

        .vehicle-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #66b254;
        }

        .vehicle-table th,
        .user-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .vehicle-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .vehicle-table td {
            text-align: center;
            font-family: Open Sans;
        }

        .vehicle-table a {
            color: blue;
            text-decoration: none;
        }

        .vehicle-table a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="sample.html">Hotel Booking</a>
                <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            </div>
            <div class="pro">
                <img src="profile photo.png" alt="Profile photo">
            </div>
            <br>
            <br>
            <br>
            <ul class="navigation">
                <li><a href="admin interface.php">Dashboard</a></li>
                <li><a href="HotelManagement.php">Hotel Management</a></li>
                <li><a href="VehicleManagement.php">Vehicle Management</a></li>
                <li><a href="UserManagement.php">User Management</a></li>
                <li><a href="sample.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <br>

    <section class="center">
        <div class="summary-card">
            <div class="card">
                <h3>Total Vehicles<br><?php echo $totalvehicles; ?></h3>
            </div>
        </div>

        <main>
            <section>
                <h2 class="vehi">Vehicle Management</h2>
                <h2 class="vehi">Add Vehicle</h2>
                <form action="" method="POST">
                    <label for="vehicleID">Vehicle ID:</label>
                    <input type="text" id="vehicleID" name="vehicleID" required><br><br>

                    <label for="vehicleType">Vehicle Type:</label>
                    <input type="text" id="vehicleType" name="vehicleType" required><br><br>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br><br>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required><br><br>

                    <input type="submit" value="Add Vehicle" name="submit">
                </form>
            </section>
            <section>
                <h3>Vehicle List</h3>
                <table class="vehicle-table">
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    // Fetch vehicles from the database
                    $query = "SELECT * FROM vehicle_table_form";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $vehicleID = $row['Vid'];
                            $vehicleType = $row['vehicle_type'];
                            $description = $row['description'];
                            $price = $row['price'];

                            echo '<tr>';
                            echo '<td>' . $vehicleID . '</td>';
                            echo '<td>' . $vehicleType . '</td>';
                            echo '<td>' . $description . '</td>';
                            echo '<td>' . $price . '</td>';
                            echo '<td>';
                            echo '<a class="edit-btn" href="edit_vehicle.php?edit=' . $vehicleID . '">Edit</a>';
                            echo '<a class="delete-btn" href="VehicleManagement.php?delete=' . $vehicleID . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No vehicles found</td></tr>';
                    }
                    ?>
                </table>
            </section>
        </main>
    </section>

    <footer>
        <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
    </footer>
</body>
</html>
