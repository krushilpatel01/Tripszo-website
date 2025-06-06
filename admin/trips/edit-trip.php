<?php
include "../../components/config/config.php";
include('../includes/header.php');
include('../includes/sidebar.php');

// Step 1: Handle POST (update form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trip_id = $_POST['trip_id'];
    $trip_name = $_POST['trip_name'];
    $destination_id = $_POST['destination_id'];
    $days = $_POST['days'];
    $nights = $_POST['nights'];
    $price = $_POST['price'];
    $overview = $_POST['overview'];
    $exclusions = $_POST['exclusions'];
    $things_to_pack = $_POST['things_to_pack'];

    $types = isset($_POST['types']) ? implode(",", $_POST['types']) : "";
    $inclusions = isset($_POST['inclusions']) ? implode(",", $_POST['inclusions']) : "";

    // Handle image upload
    if (!empty($_FILES['trip_img']['name'])) {
        $img_name = time() . "_" . $_FILES['trip_img']['name'];
        $target = "../admin-components/trip-img/" . $img_name;
        move_uploaded_file($_FILES['trip_img']['tmp_name'], $target);
    } else {
        // Keep old image if no new one uploaded
        $img_result = $conn->query("SELECT trip_img FROM trips WHERE id = $trip_id");
        $img_row = $img_result->fetch_assoc();
        $img_name = $img_row['trip_img'];
    }

    // Update trip
    $stmt = $conn->prepare("UPDATE trips SET trip_name=?, destination_id=?, days=?, nights=?, price=?, overview=?, exclusions=?, things_to_pack=?, types=?, inclusions=?, trip_img=? WHERE id=?");
    if (!$stmt) {
        die("Update query error: " . $conn->error);
    }

    $stmt->bind_param("siiisssssssi", $trip_name, $destination_id, $days, $nights, $price, $overview, $exclusions, $things_to_pack, $types, $inclusions, $img_name, $trip_id);
    $stmt->execute();
    $stmt->close();

    // Update itinerary (simplified: delete and re-insert)
    $conn->query("DELETE FROM trip_itinerary WHERE trip_id = $trip_id");

    if (!empty($_POST['itinerary_title'])) {
        foreach ($_POST['itinerary_title'] as $index => $title) {
            $desc = $_POST['itinerary_desc'][$index];
            $stmt2 = $conn->prepare("INSERT INTO trip_itinerary (trip_id, day_title, day_description) VALUES (?, ?, ?)");
            $stmt2->bind_param("iss", $trip_id, $title, $desc);
            $stmt2->execute();
            $stmt2->close();
        }
    }

    echo "<script>alert('Trip updated successfully.'); window.location.href='view-trips.php';</script>";
    exit();
}

// Step 2: Show form if GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid Trip ID'); window.location.href='view-trips.php';</script>";
    exit();
}

$trip_id = $_GET['id'];
$trip = $conn->query("SELECT * FROM trips WHERE id = $trip_id")->fetch_assoc();
$destinations = $conn->query("SELECT id, name FROM destination ORDER BY name ASC");
$icons = $conn->query("SELECT id, title FROM icons_tbl ORDER BY title ASC");
$itinerary_data = $conn->query("SELECT * FROM trip_itinerary WHERE trip_id = $trip_id");

$selected_types = explode(",", $trip['types']);
$selected_inclusions = explode(",", $trip['inclusions']);
?>

<!-- HTML form (same as previous version, pre-filled) -->
<div class="container mt-4">
    <h2>Edit Trip</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="trip_id" value="<?= $trip['id']; ?>">

        <!-- Trip Name -->
        <div class="mb-3">
            <label class="form-label">Trip Name</label>
            <input type="text" name="trip_name" class="form-control" value="<?= htmlspecialchars($trip['trip_name']); ?>" required>
        </div>

        <!-- Destination -->
        <div class="mb-3">
            <label class="form-label">Destination</label>
            <select name="destination_id" class="form-select" required>
                <option value="">-- Select --</option>
                <?php while ($dest = $destinations->fetch_assoc()): ?>
                    <option value="<?= $dest['id']; ?>" <?= $trip['destination_id'] == $dest['id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($dest['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Types -->
        <div class="mb-3">
            <label>Trip Types</label><br>
            <?php foreach (['Family', 'Friends', 'Honeymoon', 'Adventure'] as $type): ?>
                <input type="checkbox" name="types[]" value="<?= $type; ?>" <?= in_array($type, $selected_types) ? 'checked' : ''; ?>> <?= $type; ?>&nbsp;
            <?php endforeach; ?>
        </div>

        <!-- Days/Nights/Price -->
        <div class="row mb-3">
            <div class="col">
                <label>Days</label>
                <input type="number" name="days" value="<?= $trip['days']; ?>" class="form-control" required>
            </div>
            <div class="col">
                <label>Nights</label>
                <input type="number" name="nights" value="<?= $trip['nights']; ?>" class="form-control" required>
            </div>
            <div class="col">
                <label>Price</label>
                <input type="number" name="price" value="<?= $trip['price']; ?>" class="form-control" required>
            </div>
        </div>

        <!-- Overview -->
        <div class="mb-3">
            <label>Overview</label>
            <textarea name="overview" class="form-control"><?= htmlspecialchars($trip['overview']); ?></textarea>
        </div>

        <!-- Exclusions -->
        <div class="mb-3">
            <label>Exclusions</label>
            <textarea name="exclusions" class="form-control"><?= htmlspecialchars($trip['exclusions']); ?></textarea>
        </div>

        <!-- Things to Pack -->
        <div class="mb-3">
            <label>Things to Pack</label>
            <textarea name="things_to_pack" class="form-control"><?= htmlspecialchars($trip['things_to_pack']); ?></textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Trip Image</label><br>
            <?php if (!empty($trip['trip_img'])): ?>
                <img src="../admin-components/trip-img/<?= $trip['trip_img']; ?>" style="width: 120px;"><br><br>
            <?php endif; ?>
            <input type="file" name="trip_img" class="form-control">
        </div>

        <!-- Inclusions -->
        <div class="mb-3">
            <label>Inclusions</label><br>
            <?php while ($icon = $icons->fetch_assoc()): ?>
                <input type="checkbox" name="inclusions[]" value="<?= $icon['title']; ?>" <?= in_array($icon['title'], $selected_inclusions) ? 'checked' : ''; ?>> <?= $icon['title']; ?>&nbsp;
            <?php endwhile; ?>
        </div>

        <!-- Itinerary -->
        <div class="mb-3">
            <label>Itinerary</label>
            <?php while ($it = $itinerary_data->fetch_assoc()): ?>
                <input type="text" name="itinerary_title[]" value="<?= htmlspecialchars($it['day_title']); ?>" placeholder="Title" class="form-control mb-1">
                <textarea name="itinerary_desc[]" class="form-control mb-2"><?= htmlspecialchars($it['day_description']); ?></textarea>
            <?php endwhile; ?>
        </div>

        <button type="submit" class="btn btn-success">Update Trip</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
