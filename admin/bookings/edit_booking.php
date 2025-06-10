<?php
include "../../components/config/config.php";

$id = $_GET['id'] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM bookings WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE bookings SET status = '$status' WHERE id = '$id'");
    header("Location: view_booking.php?id=$id");
}
?>

<form method="POST">
    <label>Update Status</label>
    <select name="status">
        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option value="Confirmed" <?= $data['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
    </select>
    <button type="submit">Update</button>
</form>
