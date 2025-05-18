<?php
// Include header, sidebar, and footer
include('../../includes/header.php');
include('../../includes/sidebar.php');
?>

<!-- Main Content -->
<div class="container mt-5">
    <h2>Add Exclusion</h2>
    <form action="save-exclusion.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="description" class="form-label">Exclusion Description</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <!-- Optionally, add icon or other fields as needed -->
        <div class="mb-3">
            <label for="icon" class="form-label">Exclusion Icon (Optional)</label>
            <input type="file" class="form-control" name="icon">
        </div>

        <button type="submit" name="add_exclusion" class="btn btn-danger">Add Exclusion</button>
    </form>
</div>

<?php
// Include footer
include('../../includes/footer.php');
?>
