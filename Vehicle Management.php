<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}



// Check if the form is submitted
if (isset($_POST['submit'])) {
    $VNO = $_POST['VNO'];
    $Vehicle_type = $_POST['Vehicle_type'];

    // Data insert
    $query = "INSERT INTO Vehicle_table_form (VNO, Vehicle_type) VALUES ('$VNO', '$Vehicle_type')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: Vehicle Management.php?success=1');
        exit();
    } else {
        header('location: Vehicle Management.php?error=1');
        exit();
    }
}

// update the vehicle table
if (isset($_POST['update'])) {

    $VNO=$_POST['VNO'];
    $Vehicle_type=$_POST['Vehicle_type'];

//update query

$query = "UPDATE Vehicle_table_form SET Vehicle_type='$Vehicle_type' WHERE VNO='$VNO'";
$result = mysqli_query($conn, $query);

    if($result){
        header('location: Vehicle Management.php?success=1');
        exit();
    }else{
        header('location: Vehicle Management.php?error=1');
        exit();

    }

}


//get the total number of vehicles
$query = "SELECT COUNT(*) AS total_vehicles FROM Vehicle_table_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalVehicles = $row['total_vehicles'];
} else {
    $totalVehicles = 0; // If the query fails, set the count to 0
}

// Check if the form is submitted for deleting a vehicle
if (isset($_GET['delete'])) {
    $VNO = $_GET['delete'];

    // Delete query
    $query = "DELETE FROM Vehicle_table_form WHERE VNO='$VNO'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: Vehicle Management.php?success=1');
        exit();
    } else {
        header('location: Vehicle Management.php?error=1');
        exit();
    }
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

        
        form {
            max-width: 800px;
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
        .summary-card {
        text-align: center;
        flex-wrap: wrap;
         }


        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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



        select{
            margin-bottom: 10px;
            font-weight: bold;
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cfc;
            border-radius: 4px;
            background-color: #fff;
        }
        .vehi{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:#000080;

        }
        textarea {
            height: 80px;
        }
        
        .card{
            text-align: center;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 10px;
            flex-basis: 200px;
}
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 16px;
            border:none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            border-radius: 14px;
        }
        .delete-btn,
        .edit-btn {
            background-color: #f44336;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 5px;
        }

        .edit-btn {
            background-color: #4caf50;
        }
        .edit-btn,
        .delete-btn{
            background-color: #f44336;
            color: #fff;
            padding: 5px 7px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
            font-family: 'Times New Roman', Times, serif;
        }
        .vehicle_table .edit-btn,
        .vehicle_table .delete-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #f44336;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            }

            .vehicle_table .edit-btn {
                background-color: #004225;
            }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .vehicle_table{
            
            margin: 0 auto;
            max-width: 1000px;
            width: 100%;
            border-collapse: collapse;
            background-color: #66b254;


        }
        .vehicle_table th,
            .user-table td {
            padding: 10px;
            border: 1px solid #ccc;
            }

            .vehicle_table th {
            background-color: #f2f2f2;
            font-weight: bold;

            }

            .vehicle_table td {
            text-align: center;
            font-family: Open Sans;
            }

            .vehicle_table a {
            color: blue;
            text-decoration: none;
            }

            .vehicle_table a:hover {
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
                <a href="sample.html">RIO Hotel & Vehicle Booking</a>
                <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1> <!--print the admin name-->
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
    <section class="center">
        <div class="summary-card">
           <div class="card">
                <h3>Total Vehicle
                <br><?php echo $totalVehicles; ?> </h3>
            </div>
        </div>
    

<main>
    <section>
        <h2 class="vehi">Vehicle Management</h2>
        <h2 class="vehi">Add Vehicle</h2>
    <form action="" method="POST">
    <label for="VehicleID">Vehicle ID:</label>
    <input type="text" id="VNO" name="VNO" required><br><br>


    


    <label for="Vehicle_dropdown">Vehicle Type:</label>
        <select name="Vehicle_type">
         <option value="Bike">Bike</option>
         <option value="Car">Car</option>
         <option value="Van">Van</option>
         <option value="3wheel">3 Wheel</option>
      </select>
     <br><br>
    <input type="submit" value="Add Vehicle" name="submit">
    </form>
    </section>

<br>
    <section>
    <h2>Vehicle List</h2>
    <table class="vehicle_table">
        <tr>
            <th>Vehicle ID</th>
            <th>Vehicle Type</th>
            <th>Actions</th>
        </tr>

<BR>
        <?php
        $query = "SELECT * FROM Vehicle_table_form";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $VNO = $row['VNO'];
                $Vehicle_type = $row['Vehicle_type'];
              

                echo'<br>';
                echo '<tr>';
                echo '<td>' . $VNO . '</td>';
                echo '<td>' . $Vehicle_type . '</td>';
               
                
                echo '<td>';
                echo '<a class="edit-btn" href="edit_vehicle.php?edit=' . $VNO . '">Edit</a>';
                echo '<a class="delete-btn" href="Vehicle Management.php?delete=' . $VNO . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6">No hotels found</td></tr>';
        }
          ?>
    </table>
</section>
<BR>
<BR>
<BR>

</main>
    <footer>
        <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
    </footer>
</body>
</html> 
