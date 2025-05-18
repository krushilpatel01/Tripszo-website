<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">View Bookings</h2>
<div class="container mt-5">
    
    <!-- Table to show the bookings -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Destination</th>
                <th>Trip Date</th>
                <th>Booking Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example of a booking entry -->
            <tr>
                <td>1</td>
                <td>#BK001</td>
                <td>John Doe</td>
                <td>Kerala</td>
                <td>2025-06-15</td>
                <td>Confirmed</td>
                <td>
                    <a href="view_booking.php?id=1" class="btn btn-primary btn-sm">View</a>
                    <a href="edit_booking.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_booking.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>#BK002</td>
                <td>Jane Smith</td>
                <td>Kasol</td>
                <td>2025-07-20</td>
                <td>Pending</td>
                <td>
                    <a href="view_booking.php?id=2" class="btn btn-primary btn-sm">View</a>
                    <a href="edit_booking.php?id=2" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_booking.php?id=2" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                </td>
            </tr>
            <!-- Add more bookings dynamically -->
        </tbody>
    </table>
</div>


<?php include('../includes/footer.php'); ?>
