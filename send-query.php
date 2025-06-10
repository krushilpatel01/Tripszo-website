<?php
include "components/config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trip_id = $_POST['trip_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO trip_queries (trip_id, name, email, message) 
              VALUES ('$trip_id', '$name', '$email', '$message')";
    mysqli_query($conn, $query);

    echo "<script>alert('Query sent successfully!'); window.history.back();</script>";
}
?>
