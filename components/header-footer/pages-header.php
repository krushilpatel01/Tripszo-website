    <!-- hero banner with nav -->
    <div class="secoundry-hero">
        <div class="container">
            <?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="components/images/logo-3.png" class="w-50 h-100 d-block" alt="" srcset=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars fa-xl"
                                style="color: #ffffff;"></i></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>"
                                    href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage == 'about.php' ? 'active' : '' ?>"
                                    href="about.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage == 'blog.php' ? 'active' : '' ?>"
                                    href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage == 'contact.php' ? 'active' : '' ?>"
                                    href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle <?= in_array($currentPage, ['weekend-trips.php', 'international-trip.php', 'upcoming-trips.php']) ? 'active' : '' ?>"
                                    href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    All Trips
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item <?= $currentPage == 'weekend-trips.php' ? 'active' : '' ?>"
                                            href="weekend-trips.php">Weekend Trips</a></li>
                                    <li><a class="dropdown-item <?= $currentPage == 'international-trip.php' ? 'active' : '' ?>"
                                            href="international-trip.php">International Trips</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item <?= $currentPage == 'upcoming-trips.php' ? 'active' : '' ?>"
                                            href="upcoming-trips.php">Upcoming Trips</a></li>
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
    </div>