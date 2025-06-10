<?php
include "../../components/config/config.php"; // DB connection
include('../includes/header.php');
include('../includes/sidebar.php');

// Handle delete logic
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete' && is_numeric($_GET['id'])) {
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

// Handle filters
$filters = [];
if (isset($_GET['filter_category']) && is_array($_GET['filter_category'])) {
    $placeholders = implode(",", array_fill(0, count($_GET['filter_category']), '?'));
    $filters['category'] = [
        'sql' => " AND t.trip_category IN ($placeholders)",
        'values' => $_GET['filter_category']
    ];
}

// Base query
$query = "SELECT t.id, t.trip_name, t.trip_category, t.price, d.name AS destination_name 
          FROM trips t
          LEFT JOIN destination d ON t.destination_id = d.id 
          WHERE 1";

// Apply filters
$params = [];
$types = '';

if (isset($filters['category'])) {
    $query .= $filters['category']['sql'];
    foreach ($filters['category']['values'] as $val) {
        $params[] = $val;
        $types .= 's';
    }
}

$query .= " ORDER BY t.id DESC";
$stmt = $conn->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<h2 class="mb-4">All Trips</h2>

<a href="add-trip.php" class="btn btn-primary mb-3">Add New Trip</a>

<!-- Filter Section -->
<form method="GET" class="mb-3">
    <strong>Filter by Category:</strong><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="filter_category[]"
            value="Upcoming" <?= (isset($_GET['filter_category']) && in_array("Upcoming", $_GET['filter_category'])) ? 'checked' : '' ?>>
        <label class="form-check-label">Upcoming</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="filter_category[]"
            value="Weekend" <?= (isset($_GET['filter_category']) && in_array("Weekend", $_GET['filter_category'])) ? 'checked' : '' ?>>
        <label class="form-check-label">Weekend</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="filter_category[]"
            value="International" <?= (isset($_GET['filter_category']) && in_array("International", $_GET['filter_category'])) ? 'checked' : '' ?>>
        <label class="form-check-label">International</label>
    </div>
    <button type="submit" class="btn btn-sm btn-secondary ms-2">Apply Filter</button>
</form>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Trip Name</th>
            <th>Category</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($row['trip_name']); ?></td>
            <td><?= htmlspecialchars($row['trip_category']); ?></td>
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
