<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">View Inquiries of Trips</h2>

<div class="container mt-5">
    <h2 class="text-center mb-4">Customer Inquiries</h2>

    <!-- Table to show the inquiries -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Inquiry ID</th>
                <th>Customer Name</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example of an inquiry entry -->
            <tr>
                <td>1</td>
                <td>#INQ001</td>
                <td>John Doe</td>
                <td>Inquiry about trip packages</td>
                <td>2025-06-10</td>
                <td>Pending</td>
                <td>
                    <a href="view_inquiry.php?id=1" class="btn btn-primary btn-sm">View</a>
                    <a href="reply_inquiry.php?id=1" class="btn btn-success btn-sm">Reply</a>
                    <a href="delete_inquiry.php?id=1" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>#INQ002</td>
                <td>Jane Smith</td>
                <td>Question about hotel availability</td>
                <td>2025-06-15</td>
                <td>Answered</td>
                <td>
                    <a href="view_inquiry.php?id=2" class="btn btn-primary btn-sm">View</a>
                    <a href="reply_inquiry.php?id=2" class="btn btn-success btn-sm">Reply</a>
                    <a href="delete_inquiry.php?id=2" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</a>
                </td>
            </tr>
            <!-- Add more inquiries dynamically -->
        </tbody>
    </table>
</div>


<?php include('../includes/footer.php'); ?>