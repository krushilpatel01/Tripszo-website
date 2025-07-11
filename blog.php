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
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <section class="blog-wrapper py-5">
        <div class="container">
            <h2 class="text-center mb-5">ALL LATEST BLOGS</h2>

            <!-- First Blog Section -->
            <div class="row gy-4 align-items-stretch mb-5">
                <!-- Left Blog -->
                <div class="col-12 col-lg-6 d-flex">
                    <a href="blog-info.php" class="text-decoration-none text-dark w-100">
                        <div class="card shadow-sm w-100">
                            <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h3 class="card-title">Blog Title</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Right Blog Combo -->
                <div class="col-12 col-lg-6 d-flex">
                    <div class="row w-100 gy-4 mx-auto">
                        <div class="col-6 d-flex">
                            <div class="card shadow-sm w-100">
                                <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="blog-info.php" class="text-decoration-none text-primary">Blog
                                            Title</a>
                                    </h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem
                                        alias repudiandae ipsum quod sequi repellendus, minus voluptatum ratione.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 d-flex">
                            <div class="card shadow-sm w-100">
                                <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="blog-info.php" class="text-decoration-none text-primary">Blog
                                            Title</a>
                                    </h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem
                                        alias repudiandae ipsum quod sequi repellendus, minus voluptatum ratione.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Second Blog Section -->
            <div class="row gy-4 align-items-stretch mb-5">
                <!-- Right Blog Combo -->
                <div class="col-12 col-lg-6 d-flex">
                    <div class="row w-100 gy-4 mx-auto">
                        <div class="col-6 d-flex">
                            <div class="card shadow-sm w-100">
                                <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="blog-info.php" class="text-decoration-none text-primary">Blog
                                            Title</a>
                                    </h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem
                                        alias repudiandae ipsum quod sequi repellendus, minus voluptatum ratione.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 d-flex">
                            <div class="card shadow-sm w-100">
                                <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="blog-info.php" class="text-decoration-none text-primary">Blog
                                            Title</a>
                                    </h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio excepturi quidem
                                        alias repudiandae ipsum quod sequi repellendus, minus voluptatum ratione.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Left Blog -->
                <div class="col-12 col-lg-6 d-flex">
                    <a href="blog-info.php" class="text-decoration-none text-dark w-100">
                        <div class="card shadow-sm w-100">
                            <img src="components/images/blog-1.png" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h3 class="card-title">Blog Title</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row my-5 d-flex align-items-center">
                <div class="col-2"><button type="submit" class="td-icon">Plane 3d Icon</button></div>
                <div class="col-8 px-1">
                    <hr style="width:100%">
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <button type="submit" class="view-more-btn">View More</button>
                </div>
            </div>
        </div>
    </section>


    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>