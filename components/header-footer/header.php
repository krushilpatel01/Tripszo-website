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
    <title>Home</title>
</head>

<body>
    <!-- hero banner with nav -->
    <div class="hero">
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
                                    <li><a class="dropdown-item" href="weekend-trips.php">Weekend Trips</a></li>
                                    <li><a class="dropdown-item" href="international-trip.php">International Trips</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="upcoming-trips.php">Upcoming Trips</a></li>
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

        <!-- header start -->
        <header>
            <!-- slider section -->
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide slide-1">
                        <div class="header-section">
                            <div class="blck-box"></div>
                            <div class="container">
                                <form class="form-box align-self-center">
                                    <h1 class="destination-name">KERALA</h1>
                                    <p class="destintaion-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel enim
                                        distinctio magnam aspernatur perferendis saepe illo, reprehenderit consequuntur
                                        doloribus.
                                    </p>
                                    <div class="destination-search d-flex">
                                        <input class="form-control me-2" type="search"
                                            placeholder="Search Destination Here" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide slide-2">
                        <div class="header-section">
                            <div class="blck-box"></div>
                            <div class="container">
                                <form class="form-box align-self-center">
                                    <h1 class="destination-name">KASOL</h1>
                                    <p class="destintaion-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel enim
                                        distinctio magnam aspernatur perferendis saepe illo, reprehenderit consequuntur
                                        doloribus.
                                    </p>
                                    <div class="destination-search d-flex">
                                        <input class="form-control me-2" type="search"
                                            placeholder="Search Destination Here" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide slide-3">
                        <div class="header-section">
                            <div class="blck-box"></div>
                            <div class="container">
                                <form class="form-box align-self-center">
                                    <h1 class="destination-name">CHOPTA-TUNGNATH</h1>
                                    <p class="destintaion-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel enim
                                        distinctio magnam aspernatur perferendis saepe illo, reprehenderit consequuntur
                                        doloribus.
                                    </p>
                                    <div class="destination-search d-flex">
                                        <input class="form-control me-2" type="search"
                                            placeholder="Search Destination Here" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination and Arrows -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"><i class="fa-solid fa-arrow-right fa-lg" style="color: #ffffff;"></i>
                </div>
                <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i>
                </div>
            </div>
        </header>
    </div>