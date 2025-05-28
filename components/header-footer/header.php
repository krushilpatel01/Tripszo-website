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
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- header start -->
        <!-- Navbar -->
        <div class="navbar-container">
            <nav class="bg-white w-full py-6 shadow-xl rounded-xl">
                <div class="flex justify-between items-center px-6">
                    <!-- Logo -->
                    <div class="w-12 h-6 bg-black rounded"></div>

                    <!-- Navigation Links -->
                    <ul class="flex items-center space-x-10 text-sm font-medium text-gray-800 relative">
                        <li><a href="#" class="hover:text-blue-600">Home</a></li>
                        <li><a href="#" class="hover:text-blue-600">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-600">Blog</a></li>
                        <li><a href="#" class="hover:text-blue-600">Contact</a></li>

                        <!-- All Trips Dropdown -->
                        <li class="relative">
                            <button id="dropdownButton"
                                class="flex items-center gap-1 hover:text-blue-600 focus:outline-none">
                                All Trips
                                <svg class="w-2 h-4 transition-transform" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 16 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <ul id="dropdownMenu"
                                class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                                <li><a href="#" class="block px-4 py-3 text-blue-600 hover:bg-gray-100">Weekend
                                        Trips</a></li>
                                <li><a href="#" class="block px-4 py-3 text-blue-600 hover:bg-gray-100">International
                                        Trips</a></li>
                                <li><a href="#" class="block px-4 py-3 text-blue-600 hover:bg-gray-100">Upcoming
                                        Trips</a></li>
                            </ul>
                        </li>

                        <li><a href="#" class="hover:text-blue-600">Log In</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Hero Section -->
        <section class="hero20">
            <!-- Background Images -->
            <img src="heroimage3.png" alt="Third Campsite" class="hero-image3">
            <img src="heroimage2.png" alt="Foggy Campsite" class="hero-image2">
            <img src="heroimage.png" alt="Sunset Campsite" class="hero-image">

            <!-- Arrows -->
            <div class="arrow arrow-left">
                <img src="arrow1.svg" alt="Previous">
            </div>
            <div class="arrow arrow-right">
                <img src="arrow2.svg" alt="Next">
            </div>

            <!-- Content -->
            <div class="overlay">
                <h1 id="dynamicTitle" class="title slide-up">KERALA</h1>
                <p class="subtitle">
                    Discover the enchanting beauty of Kerala, where lush green landscapes, serene backwaters, and
                    vibrant culture
                    await you. <br>
                    Plan your perfect getaway to God's Own Country today!
                </p>

                <div class="search-bar">
                    <input type="text" placeholder="Search Your Destination" />
                    <button type="button">SEARCH</button>
                </div>
            </div>
        </section>
    </div>