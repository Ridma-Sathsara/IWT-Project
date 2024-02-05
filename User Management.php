<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}

// Retrieve the total number of users
$query = "SELECT COUNT(*) AS total_users FROM user_form";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['total_users'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">
    <style>
        
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
        .user-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #66b254;
            }

            .user-table th,
            .user-table td {
            padding: 10px;
            border: 1px solid #ccc;
            }

            .user-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            }

            .user-table td {
            text-align: center;
            font-family: Open Sans;
            }

            .user-table a {
            color: blue;
            text-decoration: none;
            }

            .user-table a:hover {
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

<br>
    <section class="center">
    <h2 class="vehi">User Management</h2>
    <div class="summary-card">
        <div class="card">
            <h3>Total Users</h3>
            <p><?php echo $totalUsers ?></p>
        </div>
     
    </div>
    
    <br><br>
    <h3>User List</h3>
    <table class="user-table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Actions</th>
        </tr>


        <?php
        $query = "SELECT * FROM user_form";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['user_type'] . "</td>";
            echo "<td>
                    <a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a>
                </td>";
            echo "</tr>";
        }

        
        ?>
    </table>
</section>
<br>
<br><br>
    </main>
    <footer>
        <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
    </footer>
</body>
</html>
