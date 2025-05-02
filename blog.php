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
    <title>Blog</title>
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

    <section class="blog-wrapper">
        <div class="container">
            <h2 class="centerd-title">ALL LATEST BLOGS</h2>
            <div class="row blog-section-wrapper my-4">
                <div class="col-lg-6 blogs-content">
                    <div class="blog-image">
                        <img src="components/images/blog-1.png" alt="" srcset="">
                    </div>
                    <div class="blog-desc">
                        <h3>Blog Title </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                            repudiandae
                            ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                    </div>
                </div>
                <div class="col-lg-6 blog-combo">
                    <div class="row">
                        <div class="col-lg-12 blogs-content">
                            <div class="blog-image">
                                <img src="components/images/blog-1.png" alt="" srcset="">
                            </div>
                            <div class="blog-desc">
                                <h3>Blog Title </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                                    repudiandae
                                    ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                            </div>
                        </div>
                        <div class="col-lg-12 blogs-content">
                            <div class="blog-image">
                                <img src="components/images/blog-1.png" alt="" srcset="">
                            </div>
                            <div class="blog-desc">
                                <h3>Blog Title </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                                    repudiandae
                                    ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row blog-section-wrapper2 my-4 flex-direction-reverse">
                <div class="col-lg-6 blogs-content">
                    <div class="blog-image">
                        <img src="components/images/blog-1.png" alt="" srcset="">
                    </div>
                    <div class="blog-desc">
                        <h3>Blog Title </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                            repudiandae
                            ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                    </div>
                </div>
                <div class="col-lg-6 blog-combo">
                    <div class="row">
                        <div class="col-lg-12 blogs-content">
                            <div class="blog-image">
                                <img src="components/images/blog-1.png" alt="" srcset="">
                            </div>
                            <div class="blog-desc">
                                <h3>Blog Title </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                                    repudiandae
                                    ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                            </div>
                        </div>
                        <div class="col-lg-12 blogs-content">
                            <div class="blog-image">
                                <img src="components/images/blog-1.png" alt="" srcset="">
                            </div>
                            <div class="blog-desc">
                                <h3>Blog Title </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem alias
                                    repudiandae
                                    ipsum quod sequi repellendus, minus voluptatum ratione.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>