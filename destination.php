<?php
include "components/config/config.php"; // DB connection

// Validate destination ID
if (!isset($_GET['destination']) || !is_numeric($_GET['destination'])) {
    echo "Invalid destination selected.";
    exit;
}

$dest_id = intval($_GET['destination']);

// Fetch destination detail
$dest_stmt = $conn->prepare("SELECT * FROM destination WHERE id = ?");
$dest_stmt->bind_param("i", $dest_id);
$dest_stmt->execute();
$dest_result = $dest_stmt->get_result();
$destination = $dest_result->fetch_assoc();
$dest_stmt->close();

// If destination not found
if (!$destination) {
    echo "Destination not found.";
    exit;
}

// Fetch trips related to this destination
$trip_stmt = $conn->prepare("SELECT * FROM trips WHERE destination_id = ?");
$trip_stmt->bind_param("i", $dest_id);
$trip_stmt->execute();
$trip_result = $trip_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($destination['name']) ?> - Destination</title>
    <?php include "components/css/css.php"; ?>
</head>

<body>

    <!-- include header from header folder -->
    <?php
include "components/header-footer/pages-header.php";
?>
    <!-- header over -->

    <!-- Section 1: Destination Details -->
    <section class="py-5 bg-white" style="margin: 100px auto;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="admin/admin-components/destination-img/<?= htmlspecialchars($destination['image']) ?>"
                        alt="<?= htmlspecialchars($destination['name']) ?>" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-3"><?= htmlspecialchars($destination['name']) ?></h2>
                    <p style="text-align: justify;">
                        <?= nl2br(htmlspecialchars($destination['details'])) ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Related Trips -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4 text-center">Trips in <?= htmlspecialchars($destination['name']) ?></h3>
            <div class="row">
                <?php if ($trip_result->num_rows > 0): ?>
                <?php while($trip = $trip_result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="admin/admin-components/trip-img/<?= htmlspecialchars($trip['trip_img']) ?>"
                            class="card-img-top" alt="<?= htmlspecialchars($trip['trip_name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($trip['trip_name']) ?></h5>
                            <p class="card-text text-muted">Starting from ₹<?= number_format($trip['price']) ?></p>
                            <a href="trip-show.php?id=<?= $trip['id'] ?>" class="btn btn-primary btn-sm">View Trip</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <p class="text-center">No trips found for this destination.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>