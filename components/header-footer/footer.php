<!-- footer.php -->
<!-- Start of Footer -->
<div class="footer-img"><img src="components/images/footer-icons.png"
        style="width: 100%; height: 100%;
    filter:brightness(0) saturate(100%) invert(20%) sepia(500%) saturate(532%) hue-rotate(194deg) brightness(100%) contrast(200%)" alt="" srcset=""></div>
<footer>
    <div class="container">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-lg-3 foote-logo"><img src="components/images/hero-image1.jpg" alt="" srcset=""></div>
            <div class="col-lg-9 d-flex mt-5">
                <ul class="w-100 w-sm-50 w-lg-25 footer-links px-2"
                    style="list-style: none; text-align: left; cursor: pointer;">
                    <li class="footer-heading">Menu</li>
                    <li class="my-2"><a href="index.php" style="color:white; text-decoration: none;">Home</a></li>
                    <li class="my-2"><a href="about.php" style="color:white; text-decoration: none;">About Us</a></li>
                    <li class="my-2"><a href="blog.php" style="color:white; text-decoration: none;">Blog</a></li>
                    <li class="my-2"><a href="contact.php" style="color:white; text-decoration: none;">Contact Us</a>
                    </li>
                </ul>

                <ul class="w-100 w-sm-50 w-lg-25 footer-links px-2"
                    style="list-style: none; text-align: left; cursor: pointer;">
                    <li class="footer-heading">All Trips</li>
                    <li class="my-2">Weekend Trips</li>
                    <li class="my-2">International Trips</li>
                    <li class="my-2">Upcoming Trips</li>
                </ul>

                <ul class="w-100 w-sm-50 w-lg-25 footer-links px-2"
                    style="list-style: none; text-align: left; cursor: pointer;">
                    <li class="footer-heading">Social Links</li>
                    <li class="my-2">Instagram</li>
                    <li class="my-2">Facebook</li>
                    <li class="my-2">LinkedIn</li> <!-- corrected spelling -->
                    <li class="my-2">Google Maps</li>
                </ul>

                <ul class="w-100 w-sm-50 w-lg-25 footer-links px-2"
                    style="list-style: none; text-align: left; cursor: pointer;">
                    <li class="footer-heading">Contact</li>
                    <li class="my-2">Number</li>
                    <li class="my-2">Email</li>
                    <li class="my-2">Address</li>
                </ul>
            </div>

        </div>
    </div>
    <hr>
</footer>
<!-- End of Footer -->

<!-- Link JS file -->
<script src="components/js/main.js"></script>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- fontawesome js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
    integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>
</body>

</html>