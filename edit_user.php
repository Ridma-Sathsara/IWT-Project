<?php
@include 'config.php';

session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM user_form WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

  
    if ($row) {
        $name = $row['name'];
        $email = $row['email'];
        $userType = $row['user_type'];

        // Handling submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the updated values from the form
            $updatedName = $_POST['name'];
            $updatedEmail = $_POST['email'];
            $updatedUserType = $_POST['user_type'];

         
            $updateQuery = "UPDATE user_form SET name = '$updatedName', email = '$updatedEmail', user_type = '$updatedUserType' WHERE id = '$id'";
          
            mysqli_query($conn, $updateQuery);

          
            header('location: User Management.php');
            exit();
        }
    } else {
        
    }
} else {
  
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="admininterface.css">
    <style>

.Edituser{
font-family: Georgia, 'Times New Roman', Times, serif;


}

section {
    margin-top: 20px;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}

input[type="text"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}

button[type="submit"]:hover {
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
                <li><a href="admin interface.php">Dashboard</a></li>
                <li><a href="Hotel Management.php">Hotel Management</a></li>
                <li><a href="Vehicle Management.php">Vehicle Management</a></li>
                <li><a href="User Management.php">User Management</a></li>
                <li><a href="sample.php">Logout</a></li>
            </ul>
     </nav>
    </header>
<main>
<section>
    <h2 class="Edituser">Edit User</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>" required>
        </div>
        <div class="form-group">
            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type">
                <option value="user" <?php if ($userType === 'user') echo 'selected' ?>>User</option>
                <option value="admin" <?php if ($userType === 'admin') echo 'selected' ?>>Admin</option>
            </select>
        </div>
        <br>
        <br>
        <br>
        <button type="submit">Update</button>
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
