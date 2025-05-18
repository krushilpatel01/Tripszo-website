<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Add Destination</h2>
    <form action="your_processing_script.php" method="POST" enctype="multipart/form-data" class="mb-5">
        <!-- Destination Name -->
        <div class="mb-3">
            <label for="destinationName" class="form-label">Destination Name</label>
            <input type="text" class="form-control" id="destinationName" name="destination_name" placeholder="Enter destination name" required>
        </div>

        <!-- Destination Detail -->
        <div class="mb-3">
            <label for="destinationDetail" class="form-label">Destination Details</label>
            <textarea class="form-control" id="destinationDetail" name="destination_details" rows="4" placeholder="Enter details about the destination" required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="destinationImage" class="form-label">Destination Image</label>
            <input type="file" class="form-control" id="destinationImage" name="destination_image" accept="image/*" required>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add Destination</button>
        </div>
    </form>
<hr>
<h2 class="text-center my-5">View Destinations</h2>
<div class="container mt-5">
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
            <!-- Loop through destinations here -->
            <tr>
                <td>1</td>
                <td>Kerala</td>
                <td>A beautiful state in India, known for its backwaters.</td>
                <td><img src="path_to_image.jpg" alt="Kerala" style="width: 100px; height: auto;"></td>
                <td>
                    <a href="edit_destination.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_destination.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this destination?')">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kasol</td>
                <td>A scenic village in Himachal Pradesh, famous for its trekking trails.</td>
                <td><img src="path_to_image.jpg" alt="Kasol" style="width: 100px; height: auto;"></td>
                <td>
                    <a href="edit_destination.php?id=2" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_destination.php?id=2" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this destination?')">Delete</a>
                </td>
            </tr>
            <!-- Repeat for more destinations -->
        </tbody>
    </table>
</div>

</div>





<?php include('../includes/footer.php'); ?>
