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
    <title>Trip Show</title>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <div class="container mt-4">
        <div class="row trip-show-wrapper">
            <!-- Left column: Big Image -->
            <div class="col-md-6 m-0 trip-show-main-img">
                <img src="components/images/trip-page-image2.png" class="img-fluid w-100 h-100 rounded shadow"
                    alt="Big Image" style="object-fit: cover;">
            </div>

            <!-- Right column: 4 Small Images -->
            <div class="col-md-6 trip-show-portfolio">
                <div class="row g-3">
                    <div class="col-6">
                        <img src="components/images/trip-page-image3.png" class="img-fluid rounded shadow"
                            alt="Small Image 1">
                    </div>
                    <div class="col-6">
                        <img src="components/images/trip-page-image4.png" class="img-fluid rounded shadow"
                            alt="Small Image 2">
                    </div>
                    <div class="col-6">
                        <img src="components/images/trip-page-image5.png" class="img-fluid rounded shadow"
                            alt="Small Image 3">
                    </div>
                    <div class="col-6">
                        <img src="components/images/trip-page-image3.png" class="img-fluid rounded shadow"
                            alt="Small Image 4">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="trip-overview mt-5">
        <div class="container pt-4">
            <h2 class="fw-bold">Destination Name</h2>
            <ul class="icon-list"
                style="list-style: none; display: flex; flex-wrap: wrap; align-items: center; gap: 70px; margin: 50px auto;">
                <li><i class="fa-solid fa-bus-simple fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-plane-up fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-map-location-dot fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-person-hiking fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-suitcase-rolling fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-person-swimming fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-passport fa-2xl"></i></li>
                <li>|</li>
                <li><i class="fa-solid fa-person-biking fa-2xl"></i></li>

            </ul>

        </div>
    </section>


    <section class="trip-overview mb-2">
        <div class="container pb-4">
            <div class="row mt-4">
                <div class="col-lg-8 trip-information">
                    <div class="mb-3">
                        <button class="tab-btn active" onclick="showTab('overview', event)">Overview</button>
                        <button class="tab-btn" onclick="showTab('itinerary', event)">Itinerary</button>
                        <button class="tab-btn" onclick="showTab('inclusions', event)">Inclusions</button>
                        <button class="tab-btn" onclick="showTab('exclusions', event)">Exclusions</button>
                        <button class="tab-btn" onclick="showTab('things', event)">Things To Pack</button>
                    </div>
                    <div class="tab-content-box" id="tab-content">
                        <p>Perk 1 Overview: Explore historical landmarks and iconic sites.</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="price-box mb-3">
                        <div class="starting-price-main d-flex">
                            <div class="price-inner">
                                <h6 class="text-white fs-5"><b>Starting Price</b></h6>
                                <h2>0000/-</h2>
                            </div>
                            <div class="price-colour"><small><b>000/- off</b></small></div>
                        </div>
                        <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <button class="btn-blue w-35 bg-white text-primary"><b>SEND QUERY</b></button>
                    </div>

                    <div class="price-summary mb-3">
                        <h6 class="fw-bold">Price Summary</h6>
                        <p class="mb-1">Room Sharing</p>
                        <div class="share-btn mb-2">
                            <span onclick="setRoom('Quad')">Quad</span>
                            <span onclick="setRoom('Triple')">Triple</span>
                            <span onclick="setRoom('Double')">Double</span>
                        </div>
                        <div>
                            <h2 id="room-type">QUAD</h2>
                            <p><del>Rs 0,000</del> <strong class="text-primary">Rs 0,000</strong> Per Person</p>
                        </div>
                        <a href="booking.php" class="w-100 d-block">
                            <button class="btn-blue w-100">BOOK NOW</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="review-boxes">
        <div class="container py-4">
            <div class="row">
                <!-- Dark Testimonials -->
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★★</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★★</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★★</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>

                <!-- Light Testimonials -->
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card testimonial-light w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★☆</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card testimonial-light w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★☆</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="testimonial-card testimonial-light w-100">
                        <div class="customer-info">
                            <div class="profile-circle"></div>
                            <div>
                                <div class="customer-name">Customer Name</div>
                                <div class="star-rating">★★★★☆</div>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    let currentPerk = 'perk1';

    const allContent = {
        'perk1': {
            'overview': 'Perk 1 Overview: Explore historical landmarks and iconic sites.',
            'itinerary': 'Perk 1 Itinerary: Day 1 - City Tour, Day 2 - Museum Visit.',
            'inclusions': 'Perk 1 Inclusions: Guided tours, transportation.',
            'exclusions': 'Perk 1 Exclusions: Meals, personal expenses.',
            'things': 'Perk 1 Things To Pack: Comfortable shoes, sunscreen, camera.'
        },
        'perk2': {
            'overview': 'Perk 2 Overview: Enjoy culinary delights and cultural shows.',
            'itinerary': 'Perk 2 Itinerary: Day 1 - Cooking Class, Day 2 - Local Market Tour.',
            'inclusions': 'Perk 2 Inclusions: Food tasting, show tickets.',
            'exclusions': 'Perk 2 Exclusions: Flights, alcohol.',
            'things': 'Perk 2 Things To Pack: Appetite, reusable bag, casual wear.'
        },
        'perk3': {
            'overview': 'Perk 3 Overview: Adventure-filled trip with thrill activities.',
            'itinerary': 'Perk 3 Itinerary: Day 1 - Trekking, Day 2 - River Rafting.',
            'inclusions': 'Perk 3 Inclusions: Gear, guides, safety equipment.',
            'exclusions': 'Perk 3 Exclusions: Insurance, meals.',
            'things': 'Perk 3 Things To Pack: Hiking boots, water bottle, gloves.'
        },
        'perk4': {
            'overview': 'Perk 4 Overview: Relaxing escape with spa and wellness.',
            'itinerary': 'Perk 4 Itinerary: Day 1 - Spa session, Day 2 - Yoga class.',
            'inclusions': 'Perk 4 Inclusions: Spa access, organic meals.',
            'exclusions': 'Perk 4 Exclusions: Extra treatments, flights.',
            'things': 'Perk 4 Things To Pack: Yoga mat, swimsuit, sandals.'
        },
        'perk5': {
            'overview': 'Perk 5 Overview: Family fun with kids-focused activities.',
            'itinerary': 'Perk 5 Itinerary: Day 1 - Theme Park, Day 2 - Zoo visit.',
            'inclusions': 'Perk 5 Inclusions: Entry passes, child care.',
            'exclusions': 'Perk 5 Exclusions: Toys, meals.',
            'things': 'Perk 5 Things To Pack: Snacks, water bottles, extra clothes.'
        }
    };

    function showTab(tab, event) {
        const content = allContent[currentPerk][tab];
        document.getElementById('tab-content').innerHTML = `<p>${content}</p>`;

        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }

    function setRoom(type) {
        document.getElementById('room-type').innerText = type.toUpperCase();
    }

    function selectPerk(el, perkId) {
        document.querySelectorAll('.perk-item').forEach(item => item.classList.remove('active'));
        el.classList.add('active');
        currentPerk = perkId;

        const activeTab = document.querySelector('.tab-btn.active');
        if (activeTab) {
            const tabName = activeTab.textContent.trim().toLowerCase();
            showTab(tabName, activeTab);
        }
    }
    </script>


    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>