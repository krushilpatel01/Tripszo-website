<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- include css -->
    <?php include "components/css/css.php"; ?>
    <title>Upcoming Trips</title>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <section class="trip-section-wrapper">
        <div class="container">
            <h2 class="centerd-title" style="font-size: 46px; color:blue">UPCOMING <span
                    style="color:black;">TRIPS</span></h2>
            <div class="row trips-wrapper">
                <?php
                include "components/config/config.php"; // adjust path as needed

                $sql = "SELECT * FROM trips WHERE trip_category = 'upcoming' ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <div class="col-lg-4 trip-card-3">
                    <div class="trip-price-toltip">
                        <?= $row['discount'] ?>% OFF
                    </div>
                    <div class="trip-img">
                        <img src="admin/admin-components/trip-img/<?= $row['trip_img'] ?>"
                            alt="<?= $row['trip_name'] ?>">
                    </div>
                    <div class="trip-content">
                        <h3><?= $row['trip_name'] ?></h3>
                        <h5>Rs <?= $row['price'] ?>/-</h5>
                        <div class="trip-btn d-flex justify-content-center gap-3 mt-3">
                            <!-- Send Query Button (opens modal) -->
                            <button class="btn btn-outline-primary w-50" data-bs-toggle="modal"
                                data-bs-target="#queryModal">
                                <b>SEND QUERY</b>
                            </button>

                            <!-- Know More Button (submits trip_id) -->
                            <form action="trip-show.php" method="get" class="w-50">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-warning w-100"><b>KNOW MORE</b></button>
                            </form>
                        </div>



                    </div>
                    <form method="POST" action="send-query.php">
                        <input type="hidden" name="trip_id" id="modalTripId"> <!-- 👈 move it here -->
                    </form>

                </div>

                <!-- Query Modal -->
                <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="send-query.php">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="queryModalLabel">Send Your Query</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="trip_id" value="<?= $row['id'] ?>">
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
                <?php
                    }
                } else {
                    echo "<p>No upcoming trips available at the moment.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="trips-image-gallery">
        <div class="container">
            <h2 class="centerd-title">Why Travel With Us?</h2>
            <div class="row travel-images-list gx-4">
                <div class="col-sm-12 col-md-4 travel-images-wrapper">
                    <div class="travel-img-box1"></div>
                    <div class="travel-img-box2"></div>
                </div>
                <div class="col-sm-12 col-md-4 travel-images-wrapper">
                    <div class="travel-img-box2"></div>
                    <div class="travel-img-box1"></div>
                </div>
                <div class="col-sm-12 col-md-4 travel-images-wrapper">
                    <div class="travel-img-box1"></div>
                    <div class="travel-img-box2"></div>
                </div>
            </div>
        </div>
    </section>




    <!-- <script>
    document.querySelectorAll('.open-query-modal').forEach(button => {
        button.addEventListener('click', function() {
            const tripId = this.getAttribute('data-trip-id');
            document.getElementById('modalTripId').value = tripId;
        });
    });
    </script> -->

    <!-- footer -->
    <?php include "components/header-footer/footer.php"; ?>