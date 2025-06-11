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
    <section class="about-us-section  relative-container">
        <div class="bg-txt">Who We <br> Are?</div>
        <div class="glassmorphism-overlay"></div>
        <div class="container">
            <div class="row about-wrapper align-items-center">
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image01">
                    <img src="components/images/founder.png" alt="" srcset="">
                </div>
                <div class="col-6 about-us-details">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam ut quae, quos eum laudantium
                        excepturi nisi cumque non accusamus recusandae! Consequatur voluptate quidem mollitia enim
                        veniam quos ullam harum qui nulla quasi reiciendis ratione asperiores nihil aut cumque sint,
                        laudantium voluptates quae? Soluta, dolor. Odio totam architecto neque ratione. Eius, similique
                        soluta fugiat quo voluptatem, veniam velit qui ut quaerat ex reiciendis tempora hic ipsa.
                        Reprehenderit possimus maiores dolorem provident deserunt voluptatibus, quia sequi animi quod
                        nihil totam rerum veniam odio voluptatem saepe magnam, fugit nesciunt cupiditate distinctio.
                        Doloremque saepe hic rerum voluptate harum tempore, officiis ipsum aut esse eveniet?</p>
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

                    <div class="icon-circle plane pos-0">
                        <i class="fa-solid fa-plane fa-xl"></i>
                    </div>

                    <div class="step pos-05" data-step="1">
                        <span class="step-label">Step - 1</span>
                        <div class="tooltip-box">This is the first step</div>
                    </div>

                    <div class="step pos-10" data-step="2">
                        <span class="step-label">Step - 2</span>
                        <div class="tooltip-box">This is the second step</div>
                    </div>

                    <div class="step pos-15" data-step="3">
                        <span class="step-label">Step - 3</span>
                        <div class="tooltip-box">This is the third step</div>
                    </div>

                    <div class="step pos-20" data-step="4">
                        <span class="step-label">Step - 4</span>
                        <div class="tooltip-box">This is the fourth step</div>
                    </div>

                    <div class="step pos-25" data-step="5">
                        <span class="step-label">Step - 5</span>
                        <div class="tooltip-box">This is the fifth step</div>
                    </div>

                    <div class="step pos-30" data-step="6">
                        <span class="step-label">Step - 6</span>
                        <div class="tooltip-box">This is the six step</div>
                    </div>

                    <!-- ... Continue similar for other steps ... -->
                    <div class="icon-circle destination pos-98">
                        <i class="fa-solid fa-location-dot fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- founder section -->
    <section class="about-us-section founder-section">
        <div class="container founder-overlay-wrapper">
            <!-- First row: Founder -->
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 col-lg-6 founder-detail py-3">
                    <h2>Founder</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi minima voluptatibus commodi,
                        earum fugiat porro saepe aliquam nesciunt, doloremque, eaque repudiandae repellendus veniam.
                        Recusandae, ad hic! Consequatur maiores ipsum totam fuga nulla alias asperiores nobis quia
                        officia nesciunt laborum aliquid vel, quasi perferendis, dolorum sapiente explicabo atque
                        impedit amet porro voluptates optio cumque natus! Odit illum itaque quos natus assumenda quidem
                        magnam deserunt a ab molestias sed consequatur, aspernatur sapiente saepe blanditiis amet quis
                        officiis. Perspiciatis iste molestiae adipisci sint possimus perferendis commodi ut porro.
                        Magnam, deleniti vel minus, error tempora, laudantium enim saepe alias quibusdam deserunt
                        pariatur assumenda aliquam.</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image pe-0">
                    <img src="components/images/founder.png" alt="">
                </div>
            </div>

            <!-- Second row: Co-Founder -->
            <div class="row align-items-center founder-animated-row">
                <div class="col-sm-12 col-md-6 col-lg-6 founder-detail py-3 animated-right" style="padding-left: 30px;">
                    <h2>Co - Founder</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro neque dolorum praesentium
                        eligendi quaerat tempore cum reiciendis sed eum adipisci dolor, ex, qui quidem ipsam sequi, amet
                        perspiciatis necessitatibus? Velit suscipit, atque quam amet cumque voluptas possimus nihil
                        assumenda necessitatibus repellat odio harum architecto magni. Perspiciatis, molestiae laborum
                        ex libero tempore, iusto beatae voluptate recusandae dignissimos molestias ab placeat aut? Eius
                        non facilis sed fuga vel minus ipsum, cupiditate odio nulla recusandae repellendus dignissimos
                        voluptatum. Vero ipsa unde placeat? Non, tenetur nemo. Quaerat, expedita excepturi, ducimus
                        doloremque deserunt tempora numquam vel laborum veritatis iure laboriosam ipsa est debitis.
                        Quasi, possimus.</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 founder-image animated-left">
                    <img src="components/images/founder-2.png" alt="">
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

    <!-- animation for sounder images -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const coFounderRow = document.querySelectorAll('.founder-section .row')[1];
        const leftCol = coFounderRow.querySelector('.founder-image');
        const rightCol = coFounderRow.querySelector('.founder-detail');

        leftCol.classList.add('animate-left');
        rightCol.classList.add('animate-right');

        function checkScroll() {
            const rect = coFounderRow.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                leftCol.classList.add('is-visible');
                rightCol.classList.add('is-visible');
            }
        }

        window.addEventListener('scroll', checkScroll);
        checkScroll();
    });
    </script>

    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>