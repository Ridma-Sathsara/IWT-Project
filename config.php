<?php
$conn = mysqli_connect('localhost','root','','hotel_resourses');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>