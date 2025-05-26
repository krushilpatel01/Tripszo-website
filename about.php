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
    <title>About Us</title>
</head>

<body>
    <!-- hero video with nav -->
    <div class="hero-pages">
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
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="about.php">About Us</a>
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
        <div class="header-pages">
            <div class="video-wrapper">
                <video autoplay muted loop playsinline style="width: 100%; height: 100%;">
                    <source src="components/images/itnro-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <!-- header over -->

    <!-- about-us-section -->
    <section class="about-us-section">
        <div class="container">
            <div class="row about-wrapper align-items-center">
                <div class="bg-txt">Who We <br> Are?</div>
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image">
                    <img src="components/images/founder.png" alt="" srcset="">
                </div>
                <div class="col-6 about-us-details">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla provident, vel ut, a quisquam
                        atque
                        hic ad quasi facilis sit praesentium velit reiciendis. Quis accusantium nemo atque? Animi, culpa
                        suscipit.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- servrices section -->
    <section class="services-section">
        <div class="container">
            <div class="row gap-1 d-flex justify-content-between">
                <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                    <div class="icon"><img src="components/images/liggage-icon.png"
                            style="width:50%; height: 50%; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                    <h3 class="service-name">Backpack</h3>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                    <div class="icon"><img src="components/images/aeroplane-icon.png"
                            style="width:50%; height: 50%; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                    <h3 class="service-name">International</h3>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                    <div class="icon"><img src="components/images/hiking-icon.png"
                            style="width:50%; height: 50%; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                    <h3 class="service-name">Adventureous</h3>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                    <div class="icon"><img src="components/images/-partnership-icon.png"
                            style="width:50%; height: 50%; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                    <h3 class="service-name">Corporate</h3>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                    <div class="icon"><img src="components/images/bus-icon.png"
                            style="width:50%; height: 50%; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                    <h3 class="service-name">Weekend Trips</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- our journey -->
    <section class="our-journey-section">
        <div class="container">
            <h2 class="centerd-title">Our Journey</h2>
            <div class="row our-Journey">
                <div class="journey-container">
                    <!-- SVG Line -->
                    <svg viewBox="0 0 1000 200" class="journey-line">
                        <path d="M-20,100 C400,0 400,200 600,100 S1000,100 1000,100" fill="transparent" stroke="#000"
                            stroke-width="2" />
                    </svg>

                    <!-- Journey Items -->
                    <div class="icon-circle plane" style="left: 0%; top:38%;"><i class="fa-solid fa-plane fa-xl"></i>
                    </div>

                    <div class="step" style="left: 10%; top:44%">
                        Step - 1
                        <div class="tooltip-box">This is the first step</div>
                    </div>
                    <div class="step" style="left: 25%; top:43%">
                        Step - 2
                        <div class="tooltip-box">Second milestone here</div>
                    </div>
                    <div class="step" style="left: 40%; top:57%">
                        Step - 3
                        <div class="tooltip-box">Important progress</div>
                    </div>
                    <div class="step" style="left: 55%; top:62%">
                        Step - 4
                        <div class="tooltip-box">We are halfway</div>
                    </div>
                    <div class="step" style="left: 70%; top:40%">
                        Step - 5
                        <div class="tooltip-box">Almost there</div>
                    </div>
                    <div class="step" style="left: 87%; top:38%">
                        Step - 6
                        <div class="tooltip-box">Final step</div>
                    </div>

                    <div class="icon-circle destination" style="left: 97%; top:40%">
                        <i class="fa-solid fa-location-dot fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- founder section -->
    <section class="founder-section">
        <div class="container">
            <div class="row p-1 align-items-center flex-wrap-reverse fade-in-section">
                <div class="col-sm-12 col-md-6 col-lg-6 founder-detail p-3">
                    <h2>Founder</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image">
                    <img src="components/images/founder.png" alt="">
                </div>
            </div>

            <div class="row p-1 align-items-center fade-in-section">
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image">
                    <img src="components/images/founder.png" alt="">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 founder-detail p-3">
                    <h2>Co - Founder</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                </div>
            </div>
        </div>
    </section>


    <!-- our team member -->
    <section class="our-team-wrapper">
        <div class="container">
            <h2 class="centerd-title">Our Team Members</h2>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 my-2 text-center member-images">
                    <img src="components/images/team.png" alt="" srcset="">
                    <div class="member-detail">
                        <h2>Name</h2>
                        <h5>Designation</h5>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-2 text-center member-images">
                    <img src="components/images/team.png" alt="" srcset="">
                    <div class="member-detail">
                        <h2>Name</h2>
                        <h5>Designation</h5>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-2 text-center member-images">
                    <img src="components/images/team.png" alt="" srcset="">
                    <div class="member-detail">
                        <h2>Name</h2>
                        <h5>Designation</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Only trigger once
            }
        });
    }, {
        threshold: 0.2 // Adjust how much of the section must be visible
    });

    document.querySelectorAll('.fade-in-section').forEach(section => {
        observer.observe(section);
    });
    </script>
ś
    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>