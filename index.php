<!-- include header from header folder -->
<?php

    // Make sure session is started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    
include "components/header-footer/header.php";
?>
<!-- header over -->

<!-- servrices section -->
<section class="services-section">
    <div class="container">
        <div class="row gap-1 d-flex justify-content-between">
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/liggage-icon.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">Backpack</h3>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/aeroplane-icon.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">International</h3>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/hiking-icon.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">Adventureous</h3>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/-partnership-icon.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">Corporate</h3>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/bus-icon.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">Weekend Trips</h3>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 service-card">
                <div class="icon"><img src="components/images/wine-glasses.png"
                        style="width:50%; height:auto; filter: brightness(0) invert(1);" alt="" srcset=""></div>
                <h3 class="service-name">Honeymoon Trips</h3>
            </div>
        </div>
    </div>
</section>

<!-- banner section -->
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-12 banner-box">
                <button type="submit">View More</button>
            </div>
        </div>
    </div>
</section>

<!-- destination wrapper -->
<section class="desctination-wrapper">
    <div class="container">
        <h2 class="centerd-title">DESTINATION CARDS</h2>
        <div class="row desctination-list my-2">
            <?php
            include "components/config/config.php"; // DB connection

            $dest_query = "SELECT * FROM destination ORDER BY id DESC LIMIT 6";
            $dest_result = $conn->query($dest_query);

            while ($dest = $dest_result->fetch_assoc()) {
                $imgPath = !empty($dest['image']) ? "admin/admin-components/destination-img/" . $dest['image'] : "components/images/default-destination.jpg";
            ?>
            <div class="col-sm-12 col-md-6 col-lg-3 desctination-img">
                <img src="<?= $imgPath ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
                <div class="dest-box">
                    <a href="destination.php?destination=<?= urlencode($dest['id']) ?>"
                        class="d-flex align-items-center justify-content-between px-3"
                        style="color:#0C3EB2; text-decoration: none;">
                        <h3><?= htmlspecialchars($dest['name']) ?></h3>
                        <i class="fa-solid fa-arrow-right fa-sm"></i>
                    </a>
                    <hr>
                    <p><?= htmlspecialchars(substr($dest['details'], 0, 70)) ?>...</p>
                    <h2 class="dest-price">Start From ₹10,000/-</h2>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- form section -->
<section class="form-wrapper">
    <div class="container">
        <div class="row form-section">
            <div class="col-lg-6 form-content">
                <h2>Text</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aut esse maxime reiciendis, qui culpa
                    veritatis perferendis. Numquam, tenetur perferendis enim, dicta rerum labore, illum illo atque
                    impedit sit nulla.</p>
                <div class="cloud-img">
                    <img src="components/images/cloud-img.png" style="width:50%" alt="" srcset="">
                </div>
                <div class="cloud-img1">
                    <img src="components/images/cloud-img.png" style="width:70%" alt="" srcset="">
                </div>
            </div>
            <div class="col-lg-6 form-box1">
                <form action="" method="post">
                    <input type="text" name="name" id="" placeholder="Name">
                    <input type="number" name="name" id="" placeholder="Contact Number">
                    <input type="email" name="email" id="" placeholder="E-Mail">
                    <textarea name="message" placeholder="Message" id=""></textarea>
                    <input type="button" value="submit">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- tour plan structure class -->
<section class="plan-structure-wrapper">
    <div class="container">
        <h2 class="centerd-title">HOW TO PLAN YOUR TRIP ?</h2>
        <div class="row plan-list my-2 g-2">
            <div class="col-sm-12 col-md-6 col-lg-3 plan-box">
                <p>Step Desciption <br> Step Desciption - Step Desciption</p>
                <div class="plan-step">Step-1</div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 plan-box">
                <p>Step Desciption <br> Step Desciption - Step Desciption</p>
                <div class="plan-step">Step-2</div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 plan-box">
                <p>Step Desciption <br> Step Desciption - Step Desciption</p>
                <div class="plan-step">Step-3</div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 plan-box">
                <p>Step Desciption <br> Step Desciption - Step Desciption</p>
                <div class="plan-step">Step-4</div>
            </div>
        </div>
    </div>
</section>


<!-- customer reviews -->
<section class="customer-section">
    <div class="container">
        <h2 class="centerd-title">Customer Reviews</h2>
        <div class="row client-review-list">
            <div class="col-sm-12 col-md-6 col-lg-4 px-2">
                <div class="client-review mb-3">
                    <div class="client-info d-flex align-items-center mb-4">
                        <div class="client-img"><img src="components/images/person.png" alt="" srcset=""></div>
                        <div class="client-name">
                            <h2>Customer Name</h2>
                            <div class="icon"><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span></div>
                        </div>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores sunt optio
                        deleniti
                        facilis non perferendis, dolorum sed impedit obcaecati.</p>
                </div>
                <div class="client-review bg-primary">
                    <div class="client-info d-flex align-items-center mb-4">
                        <div class="client-img"><img src="components/images/person.png" alt="" srcset=""></div>
                        <div class="client-name">
                            <h2>Customer Name</h2>
                            <div class="icon"><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span></div>
                        </div>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores sunt optio
                        deleniti
                        facilis non perferendis, dolorum sed impedit obcaecati.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 px-2">
                <div class="client-review bg-primary mb-3">
                    <div class="client-info d-flex align-items-center mb-4">
                        <div class="client-img"><img src="components/images/person.png" alt="" srcset=""></div>
                        <div class="client-name">
                            <h2>Customer Name</h2>
                            <div class="icon"><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span></div>
                        </div>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores sunt optio
                        deleniti
                        facilis non perferendis, dolorum sed impedit obcaecati.</p>
                </div>
                <div class="client-review">
                    <div class="client-info d-flex align-items-center mb-4">
                        <div class="client-img"><img src="components/images/person.png" alt="" srcset=""></div>
                        <div class="client-name">
                            <h2>Customer Name</h2>
                            <div class="icon"><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span><span><i class="fa-solid fa-star me-1"
                                        style="color: #FFD43B;"></i></span></div>
                        </div>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores sunt optio
                        deleniti
                        facilis non perferendis, dolorum sed impedit obcaecati.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 video-box px-2 md-m-3">
                <!-- <h2>video box</h2> -->
            </div>
        </div>
    </div>
</section>

<!-- travel images -->
<section class="travel-images-section">
    <div class="container">
        <h2 class="centerd-title">Why Travel With Us ?</h2>
        <div class="row travel-images-list gx-4">
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