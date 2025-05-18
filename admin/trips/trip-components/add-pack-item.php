<?php
// Include header, sidebar, and footer
include('../../includes/header.php');
include('../../includes/sidebar.php');
?>

<!-- Main Content -->
<div class="container mt-5">
    <h2>Add Packing Item</h2>
    <form action="add-pack-item.php" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Packing Item Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Packing Item Description</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" name="add_pack_item" class="btn btn-primary">Add Packing Item</button>
    </form>
</div>

<?php
// Include footer
include('../../includes/footer.php');
?>
