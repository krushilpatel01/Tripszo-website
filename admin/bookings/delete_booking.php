<?php
include "../../components/config/config.php";

$id = $_GET['id'] ?? 0;

if ($id) {
    mysqli_query($conn, "DELETE FROM bookings WHERE id = '$id'");
    header("Location: view-bookings.php"); // or your bookings list page
}
