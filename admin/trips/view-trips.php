<?php
include "../../components/config/config.php"; // DB connection
include('../includes/header.php');
include('../includes/sidebar.php');


// trips delete logic this
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $trip_id = intval($_GET['id']);

    // Step 1: Delete itinerary
    $stmt1 = $conn->prepare("DELETE FROM trip_itinerary WHERE trip_id = ?");
    $stmt1->bind_param("i", $trip_id);
    $stmt1->execute();
    $stmt1->close();

    // Step 2: Delete trip
    $stmt2 = $conn->prepare("DELETE FROM trips WHERE id = ?");
    $stmt2->bind_param("i", $trip_id);
    $stmt2->execute();
    $stmt2->close();

    echo "<script>alert('Trip deleted successfully.'); window.location.href='view-trips.php';</script>";
    exit();
}

// Fetch all trips with destination names (assuming you have a destinations table)
$query = "SELECT t.id, t.trip_name, t.price, d.name AS destination_name 
          FROM trips t
          LEFT JOIN destination d ON t.destination_id = d.id 
          ORDER BY t.id DESC";

$result = $conn->query($query);
?>

<h2 class="mb-4">All Trips</h2>

<a href="add-trip.php" class="btn btn-primary mb-3">Add New Trip</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Trip Name</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $i = 1;
    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($row['trip_name']); ?></td>
            <td><?= htmlspecialchars($row['destination_name']); ?></td>
            <td>₹<?= number_format($row['price']); ?></td>
            <td>
                <a href="edit-trip.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="view-trips.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure you want to delete this trip?');">
                    Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php include('../includes/footer.php'); ?>