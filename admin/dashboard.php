<?php
session_start();

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if admin logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

// Optionally, use session variables in your page:
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
$admin_role = $_SESSION['admin_role'];
?>

<?php include('includes/header.php'); ?>

<!-- Sidebar -->
<div class="col-md-2 sidebar p-0">
    <h4 class="text-white text-center py-3">Admin Panel</h4>
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="trips/view-trips.php">Manage Trips</a>
    <a href="destinations/view-destinations.php">Destinations</a>
    <a href="types/view-types.php">Trip Types</a>
    <a href="bookings/view-bookings.php">Bookings</a>
    <a href="coupons/view-coupons.php">Coupons</a>
    <a href="bookings/view-inquiries.php">Inquiries</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main Content Area -->
<div class="col-md-10">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <span class="text-white ms-auto">Welcome, <?php echo $admin_name; ?></span>
        </div>
    </nav>

    <div class="content">

        <!-- Dashboard Content -->
        <h2 class="mb-4">Overview</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-white" style="background-color: #0C3EB2;">
                    <div class="card-body">
                        <h5 class="card-title">Total Trips</h5>
                        <p class="card-text fs-4">25</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white" style="background-color: #0C3EB2;">
                    <div class="card-body">
                        <h5 class="card-title">Bookings</h5>
                        <p class="card-text fs-4">105</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white" style="background-color: #0C3EB2;">
                    <div class="card-body">
                        <h5 class="card-title">Inquiries</h5>
                        <p class="card-text fs-4">18</p>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>