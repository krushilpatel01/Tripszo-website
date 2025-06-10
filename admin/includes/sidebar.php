<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../admin-login.php");
    exit;
}

// Optionally, use session variables in your page:
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
$admin_role = $_SESSION['admin_role'];
?>


<!-- Sidebar -->
<div class="col-md-2 sidebar p-0">
    <h4 class="text-white text-center py-3">Admin Panel</h4>
    <a href="../dashboard.php" class="active">Dashboard</a>

    <!-- change life -->
    <a href="<?= BASE_URL ?>trips/view-trips.php">Manage Trips</a>
    <a href="<?= BASE_URL ?>destinations/view-destination.php">Destinations</a>
    <a href="<?= BASE_URL ?>types/view-types.php">Trip Types</a>
    <a href="<?= BASE_URL ?>bookings/view-bookings.php">Bookings</a>
    <a href="<?= BASE_URL ?>coupons/view-coupons.php">Coupons</a>
    <a href="<?= BASE_URL ?>bookings/view-inquiries.php">Inquiries</a>
    <a href="<?= BASE_URL ?>logout.php">Logout</a>



    <!-- 
  <a href="view-trips.php">Manage Trips</a>
  <a href="destinations/view-destinations.php">Destinations</a>
  <a href="bookings/view-bookings.php">Bookings</a>
  <a href="coupons/view-coupons.php">Coupons</a>
  <a href="blogs/view-blogs.php">Blogs</a>
  <a href="inquiries/view-inquiries.php">Inquiries</a> -->
    <!-- <a href="logout.php">Logout</a> -->
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