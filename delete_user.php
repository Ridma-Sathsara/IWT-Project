<?php
@include 'config.php';

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user record from the database based on the provided ID
    $query = "DELETE FROM user_form WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      
    } else {
        
    }
} else {
    
}
?>
