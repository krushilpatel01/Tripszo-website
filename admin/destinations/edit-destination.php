<?php
include "../../components/config/config.php";
include('../includes/header.php');
include('../includes/sidebar.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM destination WHERE id = $id");
$destination = $result->fetch_assoc();

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['destination_name'];
    $details = $_POST['destination_details'];

    if (!empty($_FILES['destination_image']['name'])) {
        // New image uploaded
        $image = $_FILES['destination_image'];
        $imgName = time() . "_" . basename($image['name']);
        $uploadPath = "../upload_img/" . $imgName;

        if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
            // Delete old image
            $oldImg = "../upload_img/" . $destination['image'];
            if (file_exists($oldImg)) unlink($oldImg);

            $stmt = $conn->prepare("UPDATE destinations SET name=?, details=?, image=? WHERE id=?");
            $stmt->bind_param("sssi", $name, $details, $imgName, $id);
        }
    } else {
        // Update without changing image
        $stmt = $conn->prepare("UPDATE destination SET name=?, details=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $details, $id);
    }

    if (isset($stmt)) {
        $stmt->execute();
        $stmt->close();
    }

    header("Location: view-destination.php");
    exit;
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Destination</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="destinationName" class="form-label">Destination Name</label>
            <input type="text" class="form-control" id="destinationName" name="destination_name"
                value="<?= htmlspecialchars($destination['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="destinationDetail" class="form-label">Destination Details</label>
            <textarea class="form-control" id="destinationDetail" name="destination_details" rows="4"
                required><?= htmlspecialchars($destination['details']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="../upload_img/<?= $destination['image'] ?>" alt="" style="width: 150px;"><br><br>
            <input type="file" class="form-control" name="destination_image" accept="image/*">
            <small class="text-muted">Leave blank to keep current image.</small>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Destination</button>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>