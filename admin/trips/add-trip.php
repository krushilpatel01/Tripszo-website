<?php
include "../../components/config/config.php"; // DB connection
include('../includes/header.php');
include('../includes/sidebar.php');

// add trip form backend
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['add_inclusion'])) {
    $trip_name = $_POST['trip_name'];
    $destination_id = $_POST['destination_id'];
    $trip_category = $_POST['trip_category'];
    $types = isset($_POST['types']) ? implode(",", $_POST['types']) : '';
    $days = $_POST['days'];
    $nights = $_POST['nights'];
    $price = $_POST['price'];
    $discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;
    $overview = $_POST['overview'];
    $exclusions = $_POST['exclusions'];
    $things_to_pack = $_POST['things_to_pack'];
    $inclusions = isset($_POST['inclusions']) ? implode(",", $_POST['inclusions']) : '';
    $created_by = trim($_SESSION['admin_name']);

// === Main Trip Image ===
$trip_img = $_FILES['main_image'];
$img_name = basename($trip_img['name']);
$img_path = '../admin-components/trip-img/' . $img_name;

// === Gallery Images ===
$gallery_images = [];
$gallery_dir = '../admin-components/trip-img/gallery/';
if (!file_exists($gallery_dir)) {
    mkdir($gallery_dir, 0777, true);
}

if (isset($_FILES['gallery_images']) && count($_FILES['gallery_images']['name']) <= 4) {
    foreach ($_FILES['gallery_images']['tmp_name'] as $key => $tmp_name) {
        $filename = basename($_FILES['gallery_images']['name'][$key]);
        $filepath = $gallery_dir . $filename;
        if (move_uploaded_file($tmp_name, $filepath)) {
            $gallery_images[] = $filename;
        }
    }
}
$gallery_json = json_encode($gallery_images); // store as JSON

// Upload main image
if (move_uploaded_file($trip_img['tmp_name'], $img_path)) {
    // Insert into trip table
    $stmt = $conn->prepare("INSERT INTO trips (trip_name, trip_category, destination_id, types, days, nights, price, discount, overview, exclusions, things_to_pack, trip_img, gallery_images, inclusions, created_by)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisiiddsssssss", 
    $trip_name, $trip_category, $destination_id, $types, $days, $nights, $price, $discount, $overview, $exclusions, $things_to_pack, $img_name, $gallery_json, $inclusions, $created_by);
    $stmt->execute();
    $trip_id = $stmt->insert_id;
    $stmt->close();

    // Insert itinerary
    if (isset($_POST['itinerary_title'], $_POST['itinerary_desc'])) {
        foreach ($_POST['itinerary_title'] as $index => $title) {
            $desc = $_POST['itinerary_desc'][$index];
            $stmt = $conn->prepare("INSERT INTO trip_itinerary (trip_id, day_title, day_description) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $trip_id, $title, $desc);
            $stmt->execute();
            $stmt->close();
        }
    }

    // insert room type data
    $room_quad = isset($_POST['room_quad']) ? $_POST['room_quad'] : 0;
    $room_couple = isset($_POST['room_couple']) ? $_POST['room_couple'] : 0;
    $room_triple = isset($_POST['room_triple']) ? $_POST['room_triple'] : 0;
    
    $stmt = $conn->prepare("INSERT INTO trip_room_prices (trip_id, quad_price, couple_price, triple_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iddd", $trip_id, $room_quad, $room_couple, $room_triple);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Trip added successfully!'); window.location.href='view-trips.php';</script>";
} else {
    echo "<script>alert('Failed to upload trip image.');</script>";
}

}

// Fetch destinations from the DB
$destQuery = "SELECT id, name FROM destination ORDER BY name ASC";
$destResult = $conn->query($destQuery);

// Fetch trip types from DB
$typeQuery = "SELECT id, name FROM trip_types ORDER BY name ASC";
$typeResult = $conn->query($typeQuery);

// Check if the form is submitted for icons inclusions
if (isset($_POST['add_inclusion'])) {
    $title = $_POST['title'];
    $icon = $_FILES['icon'];
    $created_by = trim($_SESSION['admin_name']);

    // Validate file type
    $allowedMimeTypes = ['image/svg+xml'];
    if (in_array($icon['type'], $allowedMimeTypes)) {
        // Sanitize file name
        $iconName = basename($icon['name']);
        $iconName = preg_replace("/[^a-zA-Z0-9.\-_]/", "", $iconName);

        // Define upload path
        $uploadDir = '../admin-components/svg-icon/';
        $uploadPath = $uploadDir . $iconName;

        // Move the uploaded file
        if (move_uploaded_file($icon['tmp_name'], $uploadPath)) {
            // Insert inclusion into the database
            $stmt = $conn->prepare("INSERT INTO icons_tbl (title, icon_path, created_by) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $iconName, $created_by);
            $stmt->execute();
            $stmt->close();
        
            // ✅ Alert before redirect
            echo "<script>alert('Inclusion icon added successfully!'); window.location.href = '" . $_SERVER['REQUEST_URI'] . "';</script>";
            exit();
        }
        else {
            // Handle upload failure
            echo "<script>alert('Failed to upload the icon.');</script>";
        }
    } else {
        // Handle invalid file type
        echo "<script>alert('Invalid file type. Please upload an SVG file.');</script>";
    }
}

// Fetch icons from the database
$query = "SELECT id, title, icon_path FROM icons_tbl";
$result = $conn->query($query);
?>



<h2 class="mb-4">Add Trip</h2>

<!-- Add Trip Form -->
<form action="#" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow">

    <!-- Trip Name -->
    <div class="mb-3">
        <label for="tripName" class="form-label">Trip Name</label>
        <input type="text" class="form-control" id="tripName" name="trip_name" required>
    </div>

    <!-- Trip Destination show -->
    <select class="form-select mb-3" name="destination_id" required>
        <option value="">-- Select Destination --</option>
        <?php while ($destRow = $destResult->fetch_assoc()) : ?>
        <option value="<?= $destRow['id']; ?>"
            <?= (isset($_POST['id']) && $_POST['id'] == $destRow['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($destRow['name']); ?>
        </option>
        <?php endwhile; ?>
    </select>

    <!-- Trip Category -->
    <div class="mb-3">
        <label for="tripCategory" class="form-label">Trip Category</label>
        <select class="form-select" name="trip_category" required>
            <option value="">-- Select Category --</option>
            <option value="Weekend">Weekend Trip</option>
            <option value="Upcoming">Upcoming Trip</option>
            <option value="International">International Trip</option>
        </select>
    </div>

    <!-- Trip Types -->
    <div class="mb-3">
        <label class="form-label">Trip Types</label><br>
        <?php while ($typeRow = $typeResult->fetch_assoc()) : ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="types[]"
                value="<?= htmlspecialchars($typeRow['name']); ?>" id="type<?= $typeRow['id']; ?>">
            <label class="form-check-label"
                for="type<?= $typeRow['id']; ?>"><?= htmlspecialchars($typeRow['name']); ?></label>
        </div>
        <?php endwhile; ?>
    </div>


    <!-- Days & Nights -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="days" class="form-label">Days</label>
            <input type="number" class="form-control" name="days" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nights" class="form-label">Nights</label>
            <input type="number" class="form-control" name="nights" required>
        </div>
    </div>

    <!-- Price -->
    <div class="mb-3">
        <label for="price" class="form-label">Price (INR)</label>
        <input type="number" class="form-control" name="price" required>
    </div>

    <!-- Discount -->
    <div class="mb-3">
        <label for="discount" class="form-label">Discount (%)</label>
        <input type="number" name="discount" class="form-control" placeholder="Enter discount (e.g., 10)">
    </div>

    <!-- room Price show -->
    <div class="mb-3 row">
        <div class="col-md-4">
            <label class="form-label">Quad Room Price</label>
            <input type="number" name="room_quad" class="form-control" placeholder="Enter Quad Room Price">
        </div>
        <div class="col-md-4">
            <label class="form-label">Couple Room Price</label>
            <input type="number" name="room_couple" class="form-control" placeholder="Enter Couple Room Price">
        </div>
        <div class="col-md-4">
            <label class="form-label">Triple Room Price</label>
            <input type="number" name="room_triple" class="form-control" placeholder="Enter Triple Room Price">
        </div>
    </div>

    <!-- Overview -->
    <div class="mb-3">
        <label for="overview" class="form-label">Overview</label>
        <textarea class="form-control" name="overview" rows="3" required></textarea>
    </div>

    <!-- Dynamic Itinerary -->
    <div class="mb-3">
        <label class="form-label">Itinerary (Day Wise)</label>
        <div id="itineraryContainer">
            <div class="day-box mb-2">
                <input type="text" name="itinerary_title[]" class="form-control mb-2" placeholder="Day 1 Title"
                    required>
                <textarea name="itinerary_desc[]" class="form-control" rows="3" placeholder="Day 1 Description"
                    required></textarea>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addDay()">Add Day</button>
        <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeDay()">Remove Day</button>
    </div>

    <!-- Inclusions -->
    <div class="mb-3">
        <label class="form-label">Select Inclusions</label>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-3 mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inclusions[]"
                        value="<?php echo $row['id']; ?>" id="inc<?php echo $row['id']; ?>">
                    <label class="form-check-label" for="inc<?php echo $row['id']; ?>">
                        <img src="../admin-components/svg-icon/<?php echo $row['icon_path']; ?>" width="20" height="20"
                            alt=""> <?php echo htmlspecialchars($row['title']); ?>
                    </label>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Exclusions -->
    <div class="mb-3">
        <label for="exclusions" class="form-label">Exclusions</label>
        <textarea class="form-control" name="exclusions" rows="3" required></textarea>
    </div>

    <!-- Things to Pack -->
    <div class="mb-3">
        <label for="things" class="form-label">Things to Pack</label>
        <textarea class="form-control" name="things_to_pack" rows="3" required></textarea>
    </div>

    <!-- Main Trip Image -->
    <div class="mb-3">
        <label class="form-label">Main Trip Image</label>
        <input type="file" name="main_image" class="form-control" required>
    </div>

    <!-- Trip Gallery Images -->
    <div class="mb-3">
        <label class="form-label">Trip Gallery Images (4 Images)</label>
        <input type="file" name="gallery_images[]" class="form-control" multiple accept="image/*" required>
        <small class="text-muted">You can upload up to 4 images.</small>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success">Add Trip</button>
</form>

<!-- Inclusion Add Form (Design Only) -->
<hr class="mt-5">
<h4>Add New Inclusion</h4>
<form method="POST" enctype="multipart/form-data" class="border p-3 bg-light mt-3">
    <div class="row">
        <div class="col-md-4">
            <input type="text" class="form-control mb-2" name="title" placeholder="Inclusion Title" required>
        </div>
        <div class="col-md-4">
            <input type="file" class="form-control mb-2" name="icon" accept=".svg,image/svg+xml" required>
        </div>
        <div class="col-md-4">
            <button type="submit" name="add_inclusion" class="btn btn-info">Add Inclusion</button>
        </div>
    </div>
</form>


<!-- JS for Itinerary -->
<script>
let dayCount = 1;

function addDay() {
    dayCount++;
    const container = document.getElementById("itineraryContainer");
    const dayBox = document.createElement("div");
    dayBox.className = "day-box mb-2";
    dayBox.innerHTML = `
      <input type="text" name="itinerary_title[]" class="form-control mb-2" placeholder="Day ${dayCount} Title" required>
      <textarea name="itinerary_desc[]" class="form-control" rows="3" placeholder="Day ${dayCount} Description" required></textarea>
    `;
    container.appendChild(dayBox);
}

function removeDay() {
    const container = document.getElementById("itineraryContainer");
    if (container.children.length > 1) {
        container.removeChild(container.lastChild);
        dayCount--;
    }
}
</script>

<?php include('../includes/footer.php'); ?>