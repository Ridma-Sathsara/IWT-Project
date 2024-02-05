<?php
@include 'config.php';

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_query = "DELETE FROM Staff WHERE Staffmember_ID = '$delete_id'";
   mysqli_query($conn, $delete_query);

   header('location: Hmanager_add_staff.php');
   exit();
}
?>
