<?php
include "components/config/config.php";
$trip_id = $_GET['id'] ?? 0;

$query = mysqli_query($conn, "SELECT * FROM trips WHERE id = '$trip_id'");
$trip = mysqli_fetch_assoc($query);

if (!$trip) {
    echo "<script>alert('Trip not found'); window.location.href='trip-show.php';</script>";
    exit;
}

// for destination name
$query = mysqli_query($conn, "
    SELECT 
        trips.*, 
        destination.name AS destination_name 
    FROM trips 
    LEFT JOIN destination ON trips.destination_id = destination.id 
    WHERE trips.id = '$trip_id'
");

$trip = mysqli_fetch_assoc($query);

// for inclusions icons

$inclusion_ids = explode(',', $trip['inclusions']);
$icon_ids_str = implode(',', array_map('intval', $inclusion_ids)); // sanitize
$icons = [];

if ($icon_ids_str) {
    $icon_query = mysqli_query($conn, "SELECT * FROM icons_tbl WHERE id IN ($icon_ids_str)");
    while ($row = mysqli_fetch_assoc($icon_query)) {
        $icons[] = $row;
    }
}




// Fetch room prices from DB
$room_prices = [];
$trip_id = $trip['id'];
$room_query = mysqli_query($conn, "SELECT * FROM trip_room_prices WHERE trip_id = '$trip_id'");
if (mysqli_num_rows($room_query) > 0) {
    $room_prices = mysqli_fetch_assoc($room_query);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "components/css/css.php"; ?>
    <title><?= $trip['trip_name'] ?> | Tripszo Tour</title>
</head>

<body>

    <?php include "components/header-footer/pages-header.php"; ?>

    <div class="container mt-4">
        <div class="row trip-show-wrapper">
            <div class="col-md-6 m-0 trip-show-main-img">
                <img src="admin/admin-components/trip-img/<?= $trip['trip_img'] ?>"
                    class="img-fluid w-100 h-100 rounded shadow" style="object-fit: cover;">
            </div>
            <div class="col-md-6 trip-show-portfolio">
                <div class="row g-3">
                    <?php
        if (!empty($trip['gallery_images'])) {
            // Decode JSON string to array
            $gallery = json_decode($trip['gallery_images'], true);

            if (is_array($gallery)) {
                foreach ($gallery as $img) {
                    $img = trim($img, "\" "); // trim quotes and spaces just in case
                    $imgPath = "admin/admin-components/trip-img/gallery/" . $img;
                    if (file_exists($imgPath)) {
                        echo '<div class="col-6"><img src="' . $imgPath . '" class="img-fluid rounded shadow"></div>';
                    } else {
                        echo '<div class="col-6 text-danger">Image not found: ' . htmlspecialchars($img) . '</div>';
                    }
                }
            } else {
                echo '<p>Gallery images format is incorrect.</p>';
            }
        } else {
            echo '<p>No gallery images available.</p>';
        }
        ?>
                </div>
            </div>

        </div>
    </div>
    </div>

    <section class="trip-info mt-5">
        <div class="container pt-4">
            <h2 class="fw-bold"><?= $trip['destination_name'] ?> - <?= $trip['trip_name'] ?></h2>
            <ul class="icon-list d-flex flex-wrap align-items-center gap-4 list-unstyled mt-4">
                <?php foreach ($icons as $index => $icon): ?>
                <li class="d-flex align-items-center gap-2">
                    <img src="admin/admin-components/svg-icon/<?= htmlspecialchars($icon['icon_path']) ?>"
                        alt="<?= htmlspecialchars($icon['title']) ?>" width="40" height="40">
                    <?php if ($index < count($icons) - 1): ?>
                    <span class="mx-2 fw-bold text-muted">|</span>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <section class="trip-overview mb-2">
        <div class="container pb-4">
            <div class="row mt-4">

                <div class="col-lg-8 trip-information">
                    <!-- Your buttons -->
                    <div class="mb-3">
                        <button type="button" class="tab-btn active" data-tab="overview">Overview</button>
                        <button type="button" class="tab-btn" data-tab="itinerary">Itinerary</button>
                        <button type="button" class="tab-btn" data-tab="inclusions">Inclusions</button>
                        <button type="button" class="tab-btn" data-tab="exclusions">Exclusions</button>
                        <button type="button" class="tab-btn" data-tab="things">Things To Pack</button>


                    </div>

                    <div class="tab-content-box" id="tab-content">
                        <p><?= nl2br($trip['overview']) ?></p>
                    </div>

                </div>

                <!-- booking ad send query -->
                <div class="col-lg-4">
                    <div class="price-box mb-3">
                        <div class="starting-price-main d-flex">
                            <div class="price-inner">
                                <h6 class="text-white fs-5"><b>Starting Price</b></h6>
                                <h2><?= number_format($trip['price']) ?>/-</h2>
                            </div>
                            <div class="price-colour"><small><b><?= number_format($trip['discount']) ?>/-
                                        off</b></small></div>
                        </div>
                        <p class="mt-2"><?= $trip['short_description'] ?? 'Exciting trip for travel lovers!' ?></p>
                        <button class="btn-blue w-35 bg-white text-primary"><b>SEND QUERY</b></button>
                    </div>

                    <div class="price-summary mb-3">
                        <h6 class="fw-bold">Price Summary</h6>
                        <p class="mb-1">Room Sharing</p>
                        <div class="share-btn mb-2">
                            <span onclick="setRoom('Quad')" class="room-btn active">Quad</span>
                            <span onclick="setRoom('Triple')" class="room-btn">Triple</span>
                            <span onclick="setRoom('Double')" class="room-btn">Double</span>
                        </div>


                        <div>
                            <h2 id="room-type">QUAD</h2>

                            <div id="room-price-box">
                                <p><strong class="text-primary">Rs
                                        <?= number_format($room_prices['quad_price']) ?></strong> Per Person</p>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="review-boxes">
        <div class="container py-4">
            <div class="row">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card <?= $i > 3 ? 'testimonial-light' : '' ?> w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer <?= $i ?></div>
                                <div class="star-rating"><?= str_repeat('★', 5 - ($i % 2)) . str_repeat('☆', $i % 2) ?>
                                </div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tripContent = <?= json_encode([
        'overview' => nl2br($trip['overview']),
        'itinerary' => nl2br($trip['itinerary']),
        'inclusions' => nl2br($trip['inclusions']),
        'exclusions' => nl2br($trip['exclusions']),
        'things' => nl2br($trip['things_to_pack'])
    ]) ?>;

        const tabButtons = document.querySelectorAll(".tab-btn");
        const contentBox = document.getElementById("tab-content");

        if (!contentBox) {
            console.error("❌ tab-content div is missing!");
            return;
        }

        tabButtons.forEach(button => {
            button.addEventListener("click", function() {
                const tab = button.dataset.tab;

                // Load safe content from PHP
                contentBox.innerHTML = `<p>${tripContent[tab]}</p>`;

                // Switch active class
                tabButtons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
            });
        });

        // Load default tab
        const defaultBtn = document.querySelector(".tab-btn.active");
        if (defaultBtn) {
            defaultBtn.click();
        }
    });
    </script>


    <?php include "components/header-footer/footer.php"; ?>