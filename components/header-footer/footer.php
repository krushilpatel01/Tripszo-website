<!-- footer.php -->
<!-- Start of Footer -->
<div class="footer-img">
    <img src="components/images/footer-icons.png"
        style="width: 100%; height: 100%;
        filter:brightness(0) saturate(100%) invert(20%) sepia(500%) saturate(532%) hue-rotate(194deg) brightness(100%) contrast(200%)" alt="">
</div>

<footer class="pt-5 pb-3 text-white">
    <div class="container">
        <div class="row justify-content-between align-items-center mb-4">
            <!-- Logo -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <img src="components/images/hero-image1.jpg" alt="Logo" class="img-fluid foote-logo">
            </div>

            <!-- Links -->
            <div class="col-lg-9">
                <div class="row">
                    <!-- Menu -->
                    <div class="col-6 col-md-3 mb-4">
                        <ul class="list-unstyled text-start">
                            <li class="footer-heading fw-bold mb-2">Menu</li>
                            <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
                            <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                            <li><a href="blog.php" class="text-white text-decoration-none">Blog</a></li>
                            <li><a href="contact.php" class="text-white text-decoration-none">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Trips -->
                    <div class="col-6 col-md-3 mb-4">
                        <ul class="list-unstyled text-start">
                            <li class="footer-heading fw-bold mb-2">All Trips</li>
                            <li>Weekend Trips</li>
                            <li>International Trips</li>
                            <li>Upcoming Trips</li>
                        </ul>
                    </div>

                    <!-- Social -->
                    <div class="col-6 col-md-3 mb-4">
                        <ul class="list-unstyled text-start">
                            <li class="footer-heading fw-bold mb-2">Social Links</li>
                            <li>Instagram</li>
                            <li>Facebook</li>
                            <li>LinkedIn</li>
                            <li>Google Maps</li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="col-6 col-md-3 mb-4">
                        <ul class="list-unstyled text-start">
                            <li class="footer-heading fw-bold mb-2">Contact</li>
                            <li>Number</li>
                            <li>Email</li>
                            <li>Address</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr class="bg-light">
        <div class="text-center small">© 2025 Your Company. All rights reserved.</div>
    </div>
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
let previousIndex = 0;

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
    on: {
        init: function() {
            const activeSlide = document.querySelector('.swiper-slide-active');
            const destinationTitle = activeSlide.querySelector('.destination-name');
            if (destinationTitle) {
                destinationTitle.classList.add('animate-up');
            }
            previousIndex = this.activeIndex;
        },
        slideChangeTransitionStart: function() {
            document.querySelectorAll('.destination-name').forEach(el => {
                el.classList.remove('animate-up', 'animate-down');
                el.style.opacity = '0';
            });
        },
        slideChangeTransitionEnd: function() {
            const activeSlide = document.querySelector('.swiper-slide-active');
            const destinationTitle = activeSlide.querySelector('.destination-name');
            if (destinationTitle) {
                if (this.activeIndex > previousIndex) {
                    destinationTitle.classList.add('animate-up');
                } else {
                    destinationTitle.classList.add('animate-down');
                }
            }
            previousIndex = this.activeIndex;
        }
    }
});
</script>

</body>

</html>