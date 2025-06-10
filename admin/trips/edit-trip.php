<?php
include "../../components/config/config.php";
include('../includes/header.php');
include('../includes/sidebar.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('Trip ID missing!'); window.location.href='view-trips.php';</script>";
    exit;
}

$trip_id = intval($_GET['id']);

// Fetch existing trip data
$stmt = $conn->prepare("SELECT * FROM trips WHERE id = ?");
$stmt->bind_param("i", $trip_id);
$stmt->execute();
$trip = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$trip) {
    echo "<script>alert('Trip not found!'); window.location.href='view-trips.php';</script>";
    exit;
}

// Handle update form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trip_name = $_POST['trip_name'];
    $destination_id = $_POST['destination_id'];
    $trip_category = $_POST['trip_category'];
    $types = isset($_POST['types']) ? implode(",", $_POST['types']) : '';
    $days = $_POST['days'];
    $nights = $_POST['nights'];
    $price = $_POST['price'];
    $overview = $_POST['overview'];
    $exclusions = $_POST['exclusions'];
    $things_to_pack = $_POST['things_to_pack'];
    $inclusions = isset($_POST['inclusions']) ? implode(",", $_POST['inclusions']) : '';
    $created_by = trim($_SESSION['admin_name']);

    // Image update handling
    $new_img_name = $trip['trip_img']; // Default: old image
    if (!empty($_FILES['trip_img']['name'])) {
        $trip_img = $_FILES['trip_img'];
        $new_img_name = basename($trip_img['name']);
        $img_path = '../admin-components/trip-img/' . $new_img_name;

        if (!move_uploaded_file($trip_img['tmp_name'], $img_path)) {
            echo "<script>alert('Failed to upload new image.');</script>";
        }
    }

    // Update query
    $stmt = $conn->prepare("UPDATE trips SET trip_name=?, trip_category=?, destination_id=?, types=?, days=?, nights=?, price=?, overview=?, exclusions=?, things_to_pack=?, trip_img=?, inclusions=?, created_by=? WHERE id=?");
    $stmt->bind_param("sssiiisssssssi", $trip_name, $trip_category, $destination_id, $types, $days, $nights, $price, $overview, $exclusions, $things_to_pack, $new_img_name, $inclusions, $created_by, $trip_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Trip updated successfully!'); window.location.href='view-trips.php';</script>";
    exit;
}

// Fetch destinations
$destQuery = "SELECT id, name FROM destination ORDER BY name ASC";
$destResult = $conn->query($destQuery);

// Fetch types
$typeQuery = "SELECT id, name FROM trip_types ORDER BY name ASC";
$typeResult = $conn->query($typeQuery);

// Fetch inclusions
$iconQuery = "SELECT id, title, icon_path FROM icons_tbl";
$iconResult = $conn->query($iconQuery);

// Convert CSV to array
$selectedTypes = explode(",", $trip['types']);
$selectedInclusions = explode(",", $trip['inclusions']);
?>

<h2 class="mb-4">Edit Trip</h2>

<form action="" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow">

    <!-- Trip Name -->
    <div class="mb-3">
        <label class="form-label">Trip Name</label>
        <input type="text" class="form-control" name="trip_name" value="<?= htmlspecialchars($trip['trip_name']) ?>" required>
    </div>

    <!-- Destination -->
    <select class="form-select mb-3" name="destination_id" required>
        <option value="">-- Select Destination --</option>
        <?php while ($destRow = $destResult->fetch_assoc()): ?>
        <option value="<?= $destRow['id']; ?>" <?= ($trip['destination_id'] == $destRow['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($destRow['name']); ?>
        </option>
        <?php endwhile; ?>
    </select>

    <!-- Category -->
    <div class="mb-3">
        <label class="form-label">Trip Category</label>
        <select class="form-select" name="trip_category" required>
            <option value="">-- Select Category --</option>
            <?php
            $categories = ['Weekend', 'Upcoming', 'International'];
            foreach ($categories as $cat) {
                $selected = ($trip['trip_category'] == $cat) ? 'selected' : '';
                echo "<option value=\"$cat\" $selected>$cat Trip</option>";
            }
            ?>
        </select>
    </div>

    <!-- Types -->
    <div class="mb-3">
        <label class="form-label">Trip Types</label><br>
        <?php while ($typeRow = $typeResult->fetch_assoc()): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="types[]" value="<?= htmlspecialchars($typeRow['name']); ?>"
                id="type<?= $typeRow['id']; ?>" <?= in_array($typeRow['name'], $selectedTypes) ? 'checked' : '' ?>>
            <label class="form-check-label" for="type<?= $typeRow['id']; ?>"><?= htmlspecialchars($typeRow['name']); ?></label>
        </div>
        <?php endwhile; ?>
    </div>

    <!-- Days & Nights -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Days</label>
            <input type="number" class="form-control" name="days" value="<?= $trip['days'] ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Nights</label>
            <input type="number" class="form-control" name="nights" value="<?= $trip['nights'] ?>" required>
        </div>
    </div>

    <!-- Price -->
    <div class="mb-3">
        <label class="form-label">Price (INR)</label>
        <input type="number" class="form-control" name="price" value="<?= $trip['price'] ?>" required>
    </div>

    <!-- Overview -->
    <div class="mb-3">
        <label class="form-label">Overview</label>
        <textarea class="form-control" name="overview" rows="3" required><?= htmlspecialchars($trip['overview']) ?></textarea>
    </div>

    <!-- Inclusions -->
    <div class="mb-3">
        <label class="form-label">Select Inclusions</label>
        <div class="row">
            <?php while ($row = $iconResult->fetch_assoc()): ?>
            <div class="col-md-3 mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inclusions[]"
                        value="<?= $row['id'] ?>" id="inc<?= $row['id'] ?>" <?= in_array($row['id'], $selectedInclusions) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="inc<?= $row['id'] ?>">
                        <img src="../admin-components/svg-icon/<?= $row['icon_path'] ?>" width="20" height="20"> <?= htmlspecialchars($row['title']) ?>
                    </label>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Exclusions -->
    <div class="mb-3">
        <label class="form-label">Exclusions</label>
        <textarea class="form-control" name="exclusions" rows="3" required><?= htmlspecialchars($trip['exclusions']) ?></textarea>
    </div>

    <!-- Things to Pack -->
    <div class="mb-3">
        <label class="form-label">Things to Pack</label>
        <textarea class="form-control" name="things_to_pack" rows="3" required><?= htmlspecialchars($trip['things_to_pack']) ?></textarea>
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="form-label">Trip Image</label>
        <input type="file" class="form-control" name="trip_img" accept="image/*">
        <p class="mt-2">Current Image: <strong><?= $trip['trip_img'] ?></strong></p>
        <img src="../admin-components/trip-img/<?= $trip['trip_img'] ?>" width="100" class="img-thumbnail">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Update Trip</button>
</form>

<?php include('../includes/footer.php'); ?>
