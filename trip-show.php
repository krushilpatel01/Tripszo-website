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

    // Already fetched from 'trips' table
    $overview = $trip['overview'];
    $exclusions = $trip['exclusions'];
    $things_to_pack = $trip['things_to_pack'];

    // Fetch itinerary from trip_itinerary table
    $itinerary_html = '';
    $itinerary_query = mysqli_query($conn, "SELECT * FROM trip_itinerary WHERE trip_id = '$trip_id' ORDER BY id ASC");
    if (mysqli_num_rows($itinerary_query) > 0) {
        while ($row = mysqli_fetch_assoc($itinerary_query)) {
            $itinerary_html .= "<h5>" . htmlspecialchars($row['day_title']) . "</h5>";
            $itinerary_html .= "<p>" . nl2br(htmlspecialchars($row['day_description'])) . "</p>";
        }
    } else {
        $itinerary_html = "<p>No itinerary available for this trip.</p>";
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
                        <!-- Tabs -->
                        <div class="col-12">
                            <div class="mb-3">
                                <button class="tab-btn active" onclick="showTab('overview', event)">Overview</button>
                                <button class="tab-btn" onclick="showTab('itinerary', event)">Itinerary</button>
                                <button class="tab-btn" onclick="showTab('inclusions', event)">Inclusions</button>
                                <button class="tab-btn" onclick="showTab('exclusions', event)">Exclusions</button>
                                <button class="tab-btn" onclick="showTab('things', event)">Things To Pack</button>
                            </div>
                            <div class="tab-content-box" id="tab-content" style="width: 100%;">
                                <p>Perk 1 Overview: Explore historical landmarks and iconic sites.</p>
                            </div>
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
                                <div class="price-colour text-center"><small><b><?= number_format($trip['discount']) ?>/-
                                            off</b></small></div>
                            </div>
                            <p class="mt-2"><?= $trip['short_description'] ?? 'Exciting trip for travel lovers!' ?></p>
                            <!-- SEND QUERY Modal Trigger -->
                            <button class="btn-blue w-100 bg-white text-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#queryModal">
                                <b>SEND QUERY</b>
                            </button>

                            <!-- BOOK NOW Button -->
                            <!-- Hidden inputs for booking -->
                            <form action="booking.php" method="get">
                                <input type="hidden" name="trip_id" value="<?= $trip['id'] ?>">

                                <button type="submit" class="btn-blue w-100 bg-primary text-white mt-2"><b>BOOK
                                        NOW</b></button>
                            </form>
                        </div>

                        <div class="price-summary mb-3">
                            <h6 class="fw-bold">Price Summary</h6>
                            <p class="mb-1">Room Sharing</p>
                            <div class="share-btn mb-2">
                                <span onclick="setRoom('Quad', this)" class="room-btn active">Quad</span>
                                <span onclick="setRoom('Triple', this)" class="room-btn">Triple</span>
                                <span onclick="setRoom('Double', this)" class="room-btn">Double</span>
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



        <!-- Query Modal -->
        <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="send-query.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="queryModalLabel">Send Your Query</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="trip_id" value="<?= $trip['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Send Query</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php include "components/header-footer/footer.php"; ?>

        <script>
        // Static content for each tab
        const tabContent = {
            'overview': `<?= addslashes(nl2br($overview)) ?>`,
            'itinerary': `<?= addslashes($itinerary_html) ?>`,
            'inclusions': `<?php
            foreach ($icons as $icon) {
                echo '<p><img src="admin/admin-components/svg-icon/' . htmlspecialchars($icon['icon_path']) . 
                    '" width="24" height="24"> ' . htmlspecialchars($icon['title']) . '</p>';
            }
        ?>`,
            'exclusions': `<?= addslashes(nl2br($exclusions)) ?>`,
            'things': `<?= addslashes(nl2br($things_to_pack)) ?>`
        };

        // Function to switch tab
        function showTab(tabKey, event) {
            // Update content
            const content = tabContent[tabKey];
            document.getElementById('tab-content').innerHTML = `<p>${content}</p>`;

            // Toggle active button
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        // Show default content on page load
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('tab-content').innerHTML = `<p>${tabContent['overview']}</p>`;
        });
        </script>