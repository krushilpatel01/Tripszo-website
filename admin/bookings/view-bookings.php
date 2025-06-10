<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">View Bookings</h2>
<div class="container mt-5">

    <!-- Table to show the bookings -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Destination</th>
                <th>Trip Date</th>
                <th>Booking Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
include "../../components/config/config.php";

// Fetch bookings and join with trips table for destination
$sql = "
    SELECT 
        b.*, 
        t.trip_name,
        d.name AS destination_name
    FROM bookings b
    LEFT JOIN trips t ON b.trip_id = t.id
    LEFT JOIN destination d ON t.destination_id = d.id
    ORDER BY b.id DESC
";


$result = $conn->query($sql);
$serial = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $serial++ . "</td>";
        echo "<td>#BK" . str_pad($row['id'], 3, '0', STR_PAD_LEFT) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['destination_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['booking_date']) . "</td>";
        echo "<td>Confirmed</td>"; // You can add status column if needed later
        echo "<td>
                <a href='view_booking.php?id={$row['id']}' class='btn btn-primary btn-sm'>View</a>
                <a href='edit_booking.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_booking.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this booking?')\">Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No bookings found.</td></tr>";
}
?>
        </tbody>

    </table>
</div>


<?php include('../includes/footer.php'); ?>