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
    speed: 1000,
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
    effect: 'creative',
    creativeEffect: {
        prev: {
            // Show previous slide from left
            translate: ['-100%', 0, 0],
        },
        next: {
            // Show next slide from right
            translate: ['100%', 0, 0],
        }
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
                destinationTitle.style.opacity = '1';
            }
            previousIndex = this.activeIndex;
        }
    }
});
</script>



<!-- latest slider javascript -->
<!-- Scripts -->
<script>
// Navbar Dropdown Script
const button = document.getElementById('dropdownButton');
const menu = document.getElementById('dropdownMenu');

button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

window.addEventListener('click', (e) => {
    if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
    }
});

// Hero Section Sliding Animation
const rightArrow = document.querySelector('.arrow-right');
const leftArrow = document.querySelector('.arrow-left');
const heroImage = document.querySelector('.hero-image');
const heroImage2 = document.querySelector('.hero-image2');
const dynamicTitle = document.getElementById('dynamicTitle');

let currentState = 0; // 0: heroimage (KERALA), 1: heroimage2 (TUNGNATH), 2: heroimage3 (KASHMIR)
let autoSlideInterval; // To store the interval ID for auto-slide

// Array of titles corresponding to each slide
const titles = ['KERALA', 'TUNGNATH', 'KASHMIR'];

// Function to update the title with slide-up animation
function updateTitle(state) {
    dynamicTitle.textContent = titles[state];
    dynamicTitle.classList.remove('slide-up'); // Remove previous animation
    void dynamicTitle.offsetWidth; // Trigger reflow to restart animation
    dynamicTitle.classList.add('slide-up'); // Apply slide-up animation
}

// Function to reset clip-path and ensure animation replay
function resetClipPath(element, direction) {
    element.classList.remove('curtain-left', 'curtain-right');
    if (direction === 'left') {
        element.style.clipPath = 'inset(0 0 0 0)';
    } else if (direction === 'right') {
        element.style.clipPath = 'inset(0 100% 0 0)';
    }
    void element.offsetWidth;
}

// Function to slide to the next image (used for auto-slide and right arrow)
function slideNext() {
    if (currentState === 0) {
        resetClipPath(heroImage, 'left');
        heroImage.classList.add('curtain-left');
        currentState = 1;
    } else if (currentState === 1) {
        resetClipPath(heroImage2, 'left');
        heroImage2.classList.add('curtain-left');
        currentState = 2;
    } else if (currentState === 2) {
        resetClipPath(heroImage2, 'right');
        resetClipPath(heroImage, 'right');
        heroImage2.classList.add('curtain-right');
        heroImage.classList.add('curtain-right');
        currentState = 0;
    }
    // Delay title update until image animation completes (2 seconds)
    setTimeout(() => {
        updateTitle(currentState);
    }, 2000);
}

// Function to slide to the previous image (used for left arrow)
function slidePrevious() {
    if (currentState === 2) {
        resetClipPath(heroImage2, 'right');
        heroImage2.classList.add('curtain-right');
        currentState = 1;
    } else if (currentState === 1) {
        resetClipPath(heroImage, 'right');
        heroImage.classList.add('curtain-right');
        currentState = 0;
    }
    // Delay title update until image animation completes (2 seconds)
    setTimeout(() => {
        updateTitle(currentState);
    }, 2000);
}

// Function to start or restart the auto-slide interval
function startAutoSlide() {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
    }
    autoSlideInterval = setInterval(slideNext, 5000);
}

// Initial start of auto-slide
startAutoSlide();

// Manual right arrow click
rightArrow.addEventListener('click', () => {
    slideNext();
    startAutoSlide(); // Reset the auto-slide timer
});

// Manual left arrow click
leftArrow.addEventListener('click', () => {
    slidePrevious();
    startAutoSlide(); // Reset the auto-slide timer
});
// Set initial title
updateTitle(currentState);
</script>

</body>

</html>