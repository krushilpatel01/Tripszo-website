<?php include('includes/header.php'); ?>

<!-- Sidebar -->
<div class="col-md-2 sidebar p-0">
    <h4 class="text-white text-center py-3">Admin Panel</h4>
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="trips/view-trips.php">Manage Trips</a>
    <a href="destinations/view-destinations.php">Destinations</a>
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
            <span class="text-white ms-auto">Welcome, Admin</span>
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