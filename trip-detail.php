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
    <title>Trip Details Page</title>
</head>

<body>
    <!-- hero banner with nav -->
    <div class="secoundry-hero">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars fa-xl"
                                style="color: #ffffff;"></i></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    All Trips
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Indian Trips</a></li>
                                    <li><a class="dropdown-item" href="#">Internationl Trips</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Upcoming Trips</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- header over -->

    <!-- trip-iamges -->
    <section class="trip-iamges-wrapper">
        <div class="container">
            <div class="row trip-images p-0">
                <div class="col-lg-6"><img src="components/images/trip-page-image1.png" alt="" srcset=""></div>
                <div class="col-lg-6">
                    <div class="row trip-iamges-combo">
                        <div class="col-lg-6"><img src="components/images/trip-page-image5.png" alt="" srcset=""></div>
                        <div class="col-lg-6"><img src="components/images/trip-page-image3.png" alt="" srcset=""></div>
                        <div class="col-lg-6"><img src="components/images/trip-page-image2.png" alt="" srcset=""></div>
                        <div class="col-lg-6"><img src="components/images/trip-page-image4.png" alt="" srcset=""></div>
                    </div>
                </div>
            </div>
            <!-- trip-title page -->
            <div class="row trip-detail">
                <!-- trip title -->
                <div class="col-12 text-center">
                    <h2 class="trip-name">Destination Name : 12 Days & 11 Nights in Dubai!</h2>
                </div>
                <div class="col-12 d-flex text-center trip-icons">
                    <div class="icon mx-5"><i class="fa-solid fa-bicycle fa-2xl" style="color:blue"></i></div>
                    <div class="icon mx-5"><i class="fa-solid fa-cable-car fa-2xl" style="color:blue"></i></div>
                    <div class="icon mx-5"><i class="fa-solid fa-binoculars fa-2xl" style="color:blue"></i></div>
                    <div class="icon mx-5"><i class="fa-solid fa-plane fa-2xl" style="color:blue"></i></div>
                    <div class="icon mx-5"><i class="fa-solid fa-suitcase-rolling fa-2xl" style="color:blue"></i></div>
                </div>
            </div>
        </div>
    </section>

    <!-- trip-detail -->
    <section class="trip-information">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 tab-container">
                    <ul class="nav nav-pills mb-4" id="tripTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="pill"
                                data-bs-target="#overview" type="button" role="tab">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itinerary-tab" data-bs-toggle="pill"
                                data-bs-target="#itinerary" type="button" role="tab">Itinerary</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="inclusions-tab" data-bs-toggle="pill"
                                data-bs-target="#inclusions" type="button" role="tab">Inclusions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="exclusions-tab" data-bs-toggle="pill"
                                data-bs-target="#exclusions" type="button" role="tab">Exclusions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pack-tab" data-bs-toggle="pill" data-bs-target="#pack"
                                type="button" role="tab">Things To Pack</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="tripTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">
                            <p>Trip overview content goes here.</p>
                        </div>
                        <div class="tab-pane fade" id="itinerary" role="tabpanel">
                            <p>Itinerary details go here.</p>
                        </div>
                        <div class="tab-pane fade" id="inclusions" role="tabpanel">
                            <p>List of inclusions goes here.</p>
                        </div>
                        <div class="tab-pane fade" id="exclusions" role="tabpanel">
                            <p>List of exclusions goes here.</p>
                        </div>
                        <div class="tab-pane fade" id="pack" role="tabpanel">
                            <p>Things to pack content goes here.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 trip-tab-btns">
                    <div class="trip-query-card">
                        <div class="trip-query">
                            <div class="trip-price-info">
                                <h3>Starting price</h3>
                                <h2>10000 /-</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque excepturi aliquam
                                    nesciunt dignissimos.</p>
                            </div>
                            <div class="trip-offer">
                                <h3>500/- Off</h3>
                            </div>
                        </div>
                        <input type="submit" value="Send Query">
                    </div>
                    <div class="trip-booking-card">
                        <h3>Price Summary</h3>
                        <hr>
                        <div class="room-shareing">
                            <h2>Room Sharing</h2>
                            <input type="button" value="Quad">
                            <input type="button" value="Tripal">
                            <input type="button" value="Double">
                        </div>
                        <div class="room-price"></div>
                        <input type="submit" value="Book Now">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>