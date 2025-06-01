<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Info</title>
    <!-- include css -->
    <?php
        include "components/css/css.php";
    ?>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <div class="container py-4">
        <div class="row" style="margin-top:100px;">
            <!-- Main Blog Content -->
            <div class="col-md-8 mt-4">
                <!-- Blog Image & Title -->
                <div class="mb-4">
                    <img src="components/images/blog-1.png" alt="Blog Image" class="img-fluid rounded mb-3">
                    <h1 class="blog-title">Explore the Beauty of Gir National Park</h1>
                    <div class="blog-meta">
                        By <strong>Admin</strong> | Posted on <span>May 29, 2025</span> | Category: <span
                            class="badge bg-primary">Wildlife</span>
                    </div>
                </div>

                <!-- Blog Content -->
                <div class="mb-5">
                    <p>Gir National Park, located in Gujarat, India, is home to the last population of Asiatic lions in
                        the wild...</p>
                    <p>Tourists can enjoy safari rides, breathtaking nature, and rich biodiversity here. It is one of
                        the best places to witness nature and wildlife together.</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis reprehenderit neque cum est
                        ipsa nihil quibusdam vitae beatae ducimus nesciunt voluptatibus pariatur nemo soluta, laboriosam
                        amet saepe esse. Illum quasi recusandae vero. Ipsa quia nemo saepe, cupiditate amet eius
                        officiis iste eveniet commodi nulla quo, itaque ipsum dolorem in rerum illum, quos sunt! Eveniet
                        temporibus iusto beatae dolores pariatur, at deleniti fugiat fugit sequi cupiditate, laborum
                        mollitia consectetur nulla, voluptatum assumenda soluta quos magni repellendus! Commodi,
                        corrupti illum. Aperiam distinctio dolore hic, dolorem tenetur asperiores incidunt id!
                        Voluptate, deleniti. Quisquam fugit iusto hic quos commodi tempore expedita ducimus, qui nulla?
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque blanditiis aliquam, tempora fuga
                        vitae sapiente ut hic minus aperiam optio.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, ut!</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

                <!-- Tags -->
                <div class="mb-4 blog-tags">
                    <strong>Tags:</strong>
                    <span class="badge bg-secondary">Nature</span>
                    <span class="badge bg-secondary">Wildlife</span>
                    <span class="badge bg-secondary">Gujarat</span>
                </div>

                <!-- Share Buttons -->
                <div class="mb-5 share-btns">
                    <strong>Share:</strong>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                </div>

                <!-- Related Posts -->
                <div class="mb-5">
                    <h5>Related Blogs</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card related-posts">
                                <img src="components/images/blog-1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">Best Beaches in Diu</h6>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- More related cards -->
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-md-4">

                <!-- Search Box -->
                <div class="sidebar-section">
                    <h5>Search Blog</h5>
                    <form class="d-flex align-items-center" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search blog..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Go</button>
                    </form>
                </div>

                <!-- Categories -->
                <div class="sidebar-section">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Wildlife</a></li>
                        <li><a href="#">Beaches</a></li>
                        <li><a href="#">Temples</a></li>
                        <li><a href="#">Food Tours</a></li>
                    </ul>
                </div>

                <!-- Recent Blogs -->
                <div class="sidebar-section">
                    <h5>Recent Blogs</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#">Top 5 Temples to Visit in Gujarat</a></li>
                        <li class="list-group-item"><a href="#">Street Foods You Must Try</a></li>
                        <li class="list-group-item"><a href="#">Monsoon Getaways in Gujarat</a></li>
                    </ul>
                </div>

                <!-- Popular Tags -->
                <div class="sidebar-section">
                    <h5>Popular Tags</h5>
                    <span class="badge bg-light text-dark border">Adventure</span>
                    <span class="badge bg-light text-dark border">Temple</span>
                    <span class="badge bg-light text-dark border">Nature</span>
                    <span class="badge bg-light text-dark border">Local</span>
                </div>

            </div>

        </div>
    </div>

    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>