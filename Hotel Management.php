<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}





if (isset($_POST['submit'])) {
    // Retrieve the form data
    $hotelID = $_POST['hotelID'];
    $hotelName = $_POST['hotelName'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $phoneNo = $_POST['phoneNo'];

    // Insert the form data into the database
    $query = "INSERT INTO hotel_table_form (Hid, name, destination, address, phone_number)
              VALUES ('$hotelID', '$hotelName', '$location', '$address', '$phoneNo')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        //  a success message
        header('location: Hotel Management.php?success=1');
        exit();
    } else {
        //  an error message
        header('location: Hotel Management.php?error=1');
        exit();
    }
}




// Check  (update hotel)
if (isset($_POST['update'])) {
    // Retrieve the form data
    $hotelID = $_POST['hotelID'];
    $hotelName = $_POST['hotelName'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $phoneNo = $_POST['phoneNo'];

    // Update 
    $query = "UPDATE hotel_table_form SET name='$hotelName', destination='$location', address='$address', phone_number='$phoneNo' WHERE Hid='$hotelID'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        //  a success message
        header('location: Hotel Management.php?success=2');
        exit();

    } else {

        //  an error message
        header('location: Hotel Management.php?error=2');
        exit();
    }
}

if (isset($_GET['delete'])) {
    $hotelID = $_GET['delete'];

    
    $query = "DELETE FROM hotel_table_form WHERE Hid='$hotelID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
       
        header('location: Hotel Management.php?success=3');
        exit();
    } else {
        
        header('location: Hotel Management.php?error=3');
        exit();
    }
}


//total hotel
$query = "SELECT COUNT(*) AS total_hotels FROM hotel_table_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalhotels = $row['total_hotels'];
} else {
    $totalhotels = 0; 
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Management</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3c7261;
            /* padding: 20px; */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary-card {
            display: flex;
            flex-wrap: wrap;
           
        }
        .vehi{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:#000080;

        }
        .card {
            background-color: #f2f2f2;
            padding: 20px;
            margin: 10px;
            flex-basis: 200px;
            text-align: center;
            
        }
        .center{
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

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
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
        .hotel_table{
            width: 100%;
            border-collapse: collapse;
            background-color: #66b254;
        }
        .hotel_table th,
            .user-table td {
            padding: 10px;
            border: 1px solid #ccc;
            }

            .hotel_table th {
            background-color: #f2f2f2;
            font-weight: bold;
            }

            .hotel_table td {
            text-align: center;
            font-family: Open Sans;
            }

            .hotel_table a {
            color: blue;
            text-decoration: none;
            }

            .hotel_table a:hover {
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
                <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1> <!--print the admin name-->
            </div>
            <div class="pro">
                <img src="profile photo.png" alt="Profile photo">
            </div>
            <br>
            <br>
            <br>
            <ul class="navigation">
            
            <li><a href="admin interface.php" >Dashboard</a></li>
            <li><a href="Hotel Management.php">Hotel Management</a></li>
            <li><a href="Vehicle Management.php">Vehicle Management</a></li>
            <li><a href="User Management.php">User Management</a></li>
            <li><a href="sample.php">Logout</a></li>
            
            </ul>
        </nav>
    </header>

<br>

<section class="center">

    <div class="summary-card">
               <div class="card">
                    <h3>Total Hotels
                    <br><?php echo $totalhotels; ?> </h3>
                    
                </div>
        
    </div>

    <main>
        <section>
            <h2 class="vehi">Hotel Management</h2>
          
            <h2 class="vehi">Add Hotel</h2>
    <form action="" method="POST">
        <label for="hotelID">Hotel ID:</label>
        <input type="text" id="hotelID" name="hotelID" required><br><br>
        
        <label for="hotelName">Hotel Name:</label>
        <input type="text" id="hotelName" name="hotelName" required><br><br>
        
        <label for="location">Destination:</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <label for="description">Address:</label>
        <textarea id="description" name="address" required></textarea><br><br>
        
        <label for="phoneNo">Phone Number:</label>
        <input type="text" id="phoneNo" name="phoneNo" required><br><br>
        
        <input type="submit" value="Add Hotel" name="submit">
    </form>
</section>
    <section>
            <h3>Hotel List</h3>
            <table class="hotel_table" >

            <tr>
            <th>Hotel ID</th>
            <th>Hotel Name</th>
            <th>Hotel Location</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
            <?php
                // Fetch hotels from the database
                $query = "SELECT * FROM hotel_table_form";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $hotelID = $row['Hid'];
                        $hotelName = $row['name'];
                        $location = $row['destination'];
                        $address = $row['address'];
                        $phoneNo = $row['phone_number'];

                        echo '<tr>';
                        echo '<td>' . $hotelID . '</td>';
                        echo '<td>' . $hotelName . '</td>';
                        echo '<td>' . $location . '</td>';
                        echo '<td>' . $address . '</td>';
                        echo '<td>' . $phoneNo . '</td>';
                        echo '<td>';
                        echo '<a class="edit-btn" href="edit_hotel.php?edit=' . $hotelID . '">Edit</a>';
                        echo '<a class="delete-btn" href="Hotel Management.php?delete=' . $hotelID . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No hotels found</td></tr>';
                }
                ?>
            </table>
        </section>
    </main>

            
        
    </main>
    <footer>
        <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
    </footer>



   

    



</body>
</html>
