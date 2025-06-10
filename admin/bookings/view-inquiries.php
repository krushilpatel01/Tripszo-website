<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">View Inquiries of Trips</h2>

<div class="container mt-5">
    <h2 class="text-center mb-4">Customer Inquiries</h2>

    <!-- Table to show the inquiries -->
    <?php
include "../../components/config/config.php";

$query = "SELECT q.*, t.trip_name 
          FROM trip_queries q 
          LEFT JOIN trips t ON q.trip_id = t.id 
          ORDER BY q.id DESC";

$result = mysqli_query($conn, $query);
$counter = 1;
?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Inquiry ID</th>
                <th>Customer Name</th>
                <th>Message</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
            // Format ID like #INQ001
            $inq_id = '#INQ' . str_pad($row['id'], 3, '0', STR_PAD_LEFT);
            ?>
            <tr>
                <td><?= $counter++ ?></td>
                <td><?= $inq_id ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= date("Y-m-d", strtotime($row['created_at'] ?? 'now')) ?></td>
                <td><?= $row['status'] ?? 'Pending' ?></td>
                <td>
                    <a href="view_inquiry.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                    <a href="reply_inquiry.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Reply</a>
                    <a href="delete_inquiry.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>


<?php include('../includes/footer.php'); ?>