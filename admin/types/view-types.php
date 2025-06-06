<?php
include "../../components/config/config.php"; // DB connection
include('../includes/header.php');
include('../includes/sidebar.php');

// Handle Add Trip Type
if (isset($_POST['add_type'])) {
    $type_name = trim($_POST['type_name']);

    if (!empty($type_name)) {
        $stmt = $conn->prepare("INSERT INTO trip_types (name) VALUES (?)");
        $stmt->bind_param("s", $type_name);

        if ($stmt->execute()) {
            echo "<script>alert('Trip type added successfully!'); window.location.href='view-types.php';</script>";
            exit;
        } else {
            echo "<script>alert('Failed to add trip type.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter a trip type name.');</script>";
    }
}

// Handle Delete Trip Type
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $type_id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM trip_types WHERE id = ?");
    $stmt->bind_param("i", $type_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Trip type deleted successfully.'); window.location.href='view-types.php';</script>";
    exit;
}

// Fetch all trip types
$typesResult = $conn->query("SELECT * FROM trip_types ORDER BY id DESC");
?>

<div class="container mt-4">
    <h2 class="mb-4">Manage Trip Types</h2>

    <!-- Add Trip Type Form -->
    <form method="POST" action="" class="mb-4">
        <div class="mb-3">
            <label for="type_name" class="form-label">Trip Type Name</label>
            <input type="text" name="type_name" id="type_name" class="form-control" required>
        </div>
        <button type="submit" name="add_type" class="btn btn-primary">Add Trip Type</button>
    </form>

    <!-- Trip Types Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Trip Type</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = $typesResult->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= $row['created_at']; ?></td>
                    <td>
                        <a href="view-types.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this trip type?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
