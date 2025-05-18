<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">All Trips</h2>

<a href="add-trip.php" class="btn btn-primary mb-3">Add New Trip</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Trip Name</th>
      <th>Location</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Manali Tour</td>
      <td>Himachal</td>
      <td>₹9,999</td>
      <td>
        <a href="edit-trip.php?id=1" class="btn btn-sm btn-warning">Edit</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
    <!-- Repeat rows dynamically from DB -->
  </tbody>
</table>

<?php include('../includes/footer.php'); ?>
