<?php
include "components/config/config.php"; // DB connection

if (isset($_GET['destination'])) {
    $search = $conn->real_escape_string($_GET['destination']);

    // Search destination name or trip name
    $query = "SELECT trips.*, destination.name AS destination_name 
              FROM trips 
              LEFT JOIN destination ON trips.destination_id = destination.id 
              WHERE destination.name LIKE '%$search%' OR trips.trip_name LIKE '%$search%'";

    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Results</title>
    <?php include "components/css/css.php"; ?>
</head>

<body>
    <!-- include header from header folder -->
    <?php
include "components/header-footer/pages-header.php";
?>
    <!-- header over -->

    <div class="container" style="margin: 150px auto; ">
        <h2>Search Results for "<span style="color: #007bff"><?= htmlspecialchars($_GET['destination']); ?></span>"</h2>

        <?php if (isset($result) && $result->num_rows > 0) { ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="../../admin/admin-components/trip-img/<?= $row['image']; ?>" class="card-img-top"
                        alt="<?= $row['trip_name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['trip_name']; ?></h5>
                        <p class="card-text"><strong>Destination:</strong> <?= $row['destination_name']; ?></p>
                        <p class="card-text"><strong>Price:</strong> ₹<?= number_format($row['price']); ?></p>
                        <a href="trip-details.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } else { ?>
        <div class="alert alert-danger mt-4">No trips found for
            "<strong><?= htmlspecialchars($_GET['destination']); ?></strong>".</div>
        <?php } ?>
    </div>


<!-- footer addd -->
<?php
  include "components/header-footer/footer.php";
 ?>
</body>

</html>