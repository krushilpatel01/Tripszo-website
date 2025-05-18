<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">View Coupens</h2>

<div class="container mt-5">
    <!-- Title of the page -->
    <h2 class="text-center mb-4">Add New Coupon</h2>

    <!-- Form to Add Coupon -->
    <form action="add_coupon.php" method="POST" class="mb-4">
        <div class="row my-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="couponCode">Coupon Code</label>
                    <input type="text" class="form-control" id="couponCode" name="couponCode" required placeholder="Enter coupon code">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discountAmount">Discount Amount (%)</label>
                    <input type="number" class="form-control" id="discountAmount" name="discountAmount" required placeholder="Enter discount percentage" min="1" max="100">
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Coupon</button>
    </form>

    <hr>

    <!-- Active Coupons List -->
    <h3 class="text-center mb-4">Active Coupons</h3>

    <!-- Table to display active coupons -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Coupon Code</th>
                <th>Discount Amount</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example of active coupon entry -->
            <tr>
                <td>1</td>
                <td>SAVE20</td>
                <td>20%</td>
                <td>2025-12-31</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <a href="edit_coupon.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_coupon.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>SAVE10</td>
                <td>10%</td>
                <td>2025-06-30</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <a href="edit_coupon.php?id=2" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_coupon.php?id=2" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</a>
                </td>
            </tr>
            <!-- Add more active coupons dynamically -->
        </tbody>
    </table>
</div>


<?php include('../includes/footer.php'); ?>
