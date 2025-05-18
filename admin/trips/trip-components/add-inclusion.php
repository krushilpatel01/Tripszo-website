<?php
// Include header, sidebar, and footer
include('../../includes/header.php');
include('../../includes/sidebar.php');
?>

<!-- Main Content -->
<div class="container mt-5">
    <h2>Add Inclusion</h2>
    <form action="save-inclusion.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="description" class="form-label">Inclusion Description</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <!-- Optionally, add icon or other fields as needed -->
        <div class="mb-3">
            <label for="icon" class="form-label">Inclusion Icon (Optional)</label>
            <input type="file" class="form-control" name="icon">
        </div>

        <button type="submit" name="add_inclusion" class="btn btn-success">Add Inclusion</button>
    </form>
</div>

<?php
// Include footer
include('../../includes/footer.php');
?>
