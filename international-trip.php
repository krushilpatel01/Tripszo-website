<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- include css -->
    <?php
        include "components/css/css.php";
    ?>
    <title>International Trips</title>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <section class="trip-section-wrapper">
        <div class="container">
            <h2 class="centerd-title" style="font-size: 46px; color:blue">INTERNATIONAL <span style="color:black;">TRIPS</span></h2>
            <div class="destination-btn">
                <input type="submit" value="Dubai" id="current">
                <input type="submit" value="Thailand" id="active">
            </div>
            <div class="row trips-wrapper">
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-1.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row trips-wrapper">
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-1.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row trips-wrapper">
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-1.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                    <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn d-flex gap-2">
                            <a href="send-query.php" class="btn btn-primary" id="send-query">Send Query</a>
                            <a href="trip-show.php" class="btn" id="know-more">Know More</a>
                        </div>
                    </div>
                </div>
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


    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>