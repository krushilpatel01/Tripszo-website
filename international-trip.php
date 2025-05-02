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


    <section class="trip-section-wrapper">
        <div class="container">
            <h2 class="centerd-title" style="font-size: 46px; color:black">INTERNATIONAL TRIPS</h2>
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
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
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
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
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
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 trip-card">
                <div class="trip-price-toltip">Rs 500/- OFF</div>
                    <div class="trip-img"><img src="components/images/trip-2.png" alt="" srcset=""></div>
                    <div class="trip-content">
                        <h3>Destination</h3>
                        <h5>price</h5>
                        <div class="trip-btn">
                            <input type="submit" value="Send Query" id="send-query">
                            <input type="submit" value="Know More" id="know-more">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trips-image-gallery">
        <div class="container">
            <h2 class="centerd-title">Why Travel With Us?</h2>
            <div class="row travel-images-list">
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