<?php
include "../../components/config/config.php"; // DB connection
include('../includes/header.php'); 
include('../includes/sidebar.php');

// Handle Add Destination
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['destination_name']);
    $details = trim($_POST['destination_details']);
    $created_by = trim($_SESSION['admin_name']);

    if (!empty($name) && !empty($details) && isset($_FILES['destination_image'])) {
        $image = $_FILES['destination_image'];
        $imgName = time() . "_" . basename($image['name']);
        $uploadDir = "../admin-components/destination-img/";
        $uploadPath = $uploadDir . $imgName;

        // Move image to folder
        if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
            $stmt = $conn->prepare("INSERT INTO destination (name, details, image, created_by) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $name, $details, $imgName, $created_by);
            if ($stmt->execute()) {
                $stmt->close();
                echo "<script>alert('Destination added successfully!'); window.location.href='view-destination.php';</script>";
                exit;
            } else {
                echo "<script>alert('Failed to save destination to database.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Please fill all fields and select an image.');</script>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $getImg = $conn->query("SELECT image FROM destination WHERE id = $id");
    if ($getImg->num_rows > 0) {
        $imgData = $getImg->fetch_assoc();
        $imgPath = "../admin-components/destination-img/" . $imgData['image'];
        if (file_exists($imgPath)) unlink($imgPath);
    }
    $conn->query("DELETE FROM destination WHERE id = $id");
    header("Location: view-destination.php");
    exit;
}

// Fetch all destinations
$destinations = $conn->query("SELECT * FROM destination ORDER BY id DESC");
?>



<div class="container mt-5">
    <h2 class="text-center mb-4">Add Destination</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
        <!-- Destination Name -->
        <div class="mb-3">
            <label for="destinationName" class="form-label">Destination Name</label>
            <input type="text" class="form-control" id="destinationName" name="destination_name"
                placeholder="Enter destination name" required>
        </div>

        <!-- Destination Detail -->
        <div class="mb-3">
            <label for="destinationDetail" class="form-label">Destination Details</label>
            <textarea class="form-control" id="destinationDetail" name="destination_details" rows="4"
                required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="destinationImage" class="form-label">Destination Image</label>
            <input type="file" class="form-control" id="destinationImage" name="destination_image" accept="image/*"
                required>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add Destination</button>
        </div>
    </form>


    <!-- show destnation page start -->
    <hr>
    <h2 class="text-center my-5">View Destinations</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Destination Name</th>
                <th>Destination Details</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($destinations->num_rows > 0): $i = 1; ?>
            <?php while ($row = $destinations->fetch_assoc()): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= htmlspecialchars($row['details']); ?></td>
                <td>
                    <img src="../admin-components/destination-img/<?= $row['image']; ?>" alt="<?= $row['name']; ?>"
                        style="width: 100px; height: auto;">
                </td>
                <td>
                    <a href="edit-destination.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm mb-3">Edit</a>
                    <a href="?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this destination?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No destinations found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<?php include('../includes/footer.php'); ?>