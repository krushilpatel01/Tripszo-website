<?php
include "components/config/config.php";
$trip_id = $_GET['trip_id'] ?? null;

$query = mysqli_query($conn, "SELECT * FROM trips WHERE id = '$trip_id'");
$trip = mysqli_fetch_assoc($query);

if ($trip_id) {
    // Fetch trip data with room prices using JOIN
    $query = "
        SELECT t.*, rp.quad_price, rp.couple_price, rp.triple_price
        FROM trips t
        LEFT JOIN trip_room_prices rp ON t.id = rp.trip_id
        WHERE t.id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $trip_id);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $roomData = $result->fetch_assoc();
        // Now you can use $tripData['quad_price'], etc.
    } else {
        echo "No trip or room price found.";
    }
} else {
    echo "Trip ID not provided!";
}
?>


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
    <title>Booking Trip</title>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <section class="book-your-slot">
        <div class="container">

            <!-- steps header -->
            <div class="step-header">
                <h2 class="step-title">Book Your Slot</h2>
                <div class="steps">
                    <div class="step-box active" onclick="goToStep(1)">Step 1</div>
                    <hr style="width: 30px;">
                    <div class="step-box" onclick="goToStep(2)">Step 2</div>
                    <hr style="width: 30px;">
                    <div class="step-box" onclick="goToStep(3)">Step 3</div>
                </div>
            </div>

            <!-- step-1 -->
            <div id="step1" class="form-section1 active">
                <div class="form-container-1">
                    <h4 class="text-center font-weight-bold mb-4">Fill Your Details</h4>
                    <form id="form1">
                        <input type="text" class="form-control mb-3" id="name" placeholder="Name" required>
                        <input type="email" class="form-control mb-3" id="email" placeholder="E-Mail" required>
                        <div class="form-row">
                            <select name="country_code" class="form-select">
                                <option value="+91">+91</option>
                                <option value="+02">+02</option>
                                <option value="+01">+01</option>
                                <option value="+23">+23</option>
                                <option value="+56">+56</option>
                                <option value="+78">+78</option>
                            </select>
                            <input type="text" id="number" placeholder="Number" class="form-input" required>
                        </div>

                        <div id="error-msg" class="text-danger text-center mb-3" style="display: none;">Please fill out
                            all fields.</div>
                        <button type="submit" class="step-btn">Submit Details</button>
                    </form>
                </div>
            </div>

            <!-- step-2 -->
            <div id="step2" class="form-section1">
                <div class="section-grid d-flex gap-3">
                    <!-- Left Section: Trip Date + People -->
                    <div class="form-container-1" style="flex: 1; min-width: 0;">
                        <h5 class="font-weight-bold">Select Your Trip Date</h5>
                        <div class="mt-2 mb-3 d-flex flex-wrap gap-2" id="monthButtons">
                            <!-- JS will inject month buttons here -->
                            <button class="btn month-btn" onclick="selectMonth('June 2025')">June 2025</button>
                        </div>

                        <div class="form-group my-3">
                            <label for="roomTypeSelect" class="form-label">Select Room Type</label>
                            <select id="roomTypeSelect" class="form-select" onchange="updateRoomDetails()">
                                <option value="Quad" data-price="<?php echo $roomData['quad_price']; ?>" selected>Quad -
                                    ₹<?php echo $roomData['quad_price']; ?></option>
                                <option value="Double" data-price="<?php echo $roomData['couple_price']; ?>">Double -
                                    ₹<?php echo $roomData['couple_price']; ?></option>
                                <option value="Triple" data-price="<?php echo $roomData['triple_price']; ?>">Triple -
                                    ₹<?php echo $roomData['triple_price']; ?></option>
                            </select>
                        </div>


                        <input type="hidden" id="selectedRoomType" name="room_type" value="Quad">
                        <input type="hidden" id="selectedRoomPrice" name="room_price" value="10000">
                        <input type="hidden" id="calculatedTotal" name="calculated_total" value="0">


                        <!-- number of people -->
                        <div class="summary-box mb-3 bg-light">
                            <h5 class="font-weight-bold">Number of People</h5>

                            <div class="form-row mb-2 d-flex justify-content-between align-items-center">
                                <label>Adults</label>
                                <div>
                                    <button type="button" class="count-btn"
                                        onclick="updateCount('adult', -1)">-</button>
                                    <span id="adultCount" style="margin: 0 10px;">0</span>
                                    <button type="button" class="count-btn" onclick="updateCount('adult', 1)">+</button>
                                </div>
                            </div>

                            <div class="form-row mb-2 d-flex justify-content-between align-items-center">
                                <label>Children</label>
                                <div>
                                    <button type="button" class="count-btn"
                                        onclick="updateCount('child', -1)">-</button>
                                    <span id="childCount" style="margin: 0 10px;">0</span>
                                    <button type="button" class="count-btn" onclick="updateCount('child', 1)">+</button>
                                </div>
                            </div>

                            <div class="form-row d-flex justify-content-between align-items-center">
                                <label>Seniors</label>
                                <div>
                                    <button type="button" class="count-btn"
                                        onclick="updateCount('senior', -1)">-</button>
                                    <span id="seniorCount" style="margin: 0 10px;">0</span>
                                    <button type="button" class="count-btn"
                                        onclick="updateCount('senior', 1)">+</button>
                                </div>
                            </div>

                        </div>

                        <form id="bookingForm" method="POST"
                            action="booking-handler.php?trip_id=<?php echo $trip_id; ?>">
                            <!-- Hidden inputs for all data -->
                            <input type="hidden" name="name" id="hiddenName">
                            <input type="hidden" name="email" id="hiddenEmail">
                            <input type="hidden" name="number" id="hiddenNumber">
                            <input type="hidden" name="trip_date" id="hiddenTripDate">
                            <input type="hidden" name="room_type" id="hiddenRoomType">
                            <input type="hidden" name="room_price" id="hiddenRoomPrice">
                            <input type="hidden" name="total_people" id="hiddenTotalPeople">
                            <input type="hidden" name="gst" id="hiddenGst">
                            <input type="hidden" name="total_amount" id="hiddenTotalAmount">


                            <!-- Your existing form elements -->
                            <button type="submit" class="step-btn">Submit Booking</button>
                        </form>
                    </div>



                    <!-- Right Section: Summary + Buttons -->
                    <div class="summary-box1 d-flex flex-column justify-content-between bg-light"
                        style="flex: 1; padding: 20px; border: 1px solid #ccc; border-radius: 8px; min-height: 300px; min-width: 0;">
                        <div>
                            <h5 class="font-weight-bold mb-3">Summary</h5>
                            <p><small>Selected Month: <span id="summaryDate">Not selected</span></small></p>
                            <p id="summaryRoomType">Room Type: </p>
                            <p><small>Total People: <span id="summaryPeople">0</span></small></p>
                            <p><small>GST: ₹<span id="summaryGst">0</span></small></p>
                            <div class="amount-row mt-3 d-flex justify-content-between font-weight-bold">
                                <span>Payable Amt</span>
                                <span>₹<span id="summaryTotal">0</span></span>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <button class="step-btn" onclick="goToStep(3)">Next</button>
                            <button class="btn btn-secondary btn-back-block w-50" onclick="goBack()">Back</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step3" class="form-section1">
                <div class="form-container-1 text-center">
                    <h4 class="font-weight-bold">Your Booking Query Successfully Send!</h4>
                    <p>Thank you for your booking. We’ll contact you shortly.</p>
                    <button class="btn btn-secondary btn-back-block my-2 w-25" onclick="goBack()">Back</button>
                </div>
            </div>

        </div>
    </section>



    <!-- javsacript for booking page -->
    <script>
    let currentStep = 1;

    // Step Navigation
    function goToStep(step) {
        document.querySelectorAll('.form-section1').forEach((section, index) => {
            section.classList.remove('active');
            if (index === step - 1) {
                section.classList.add('active');
                currentStep = step;
            }
        });

        document.querySelectorAll('.step-box').forEach((box, index) => {
            if (index === step - 1) {
                box.classList.add('active');
            } else {
                box.classList.remove('active');
            }
        });
    }

    function goBack() {
        if (currentStep > 1) {
            goToStep(currentStep - 1);
        }
    }

    // Form Step 1 Validation
    document.getElementById('form1').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const number = document.getElementById('number').value.trim();

        if (name && email && number) {
            // Save to local storage or global variable if needed
            goToStep(2); // move to next step
        } else {
            document.getElementById('error-msg').style.display = 'block';
        }
    });


    // this is for month show 
    function injectMonthButtons() {
        const container = document.getElementById('monthButtons');
        container.innerHTML = ''; // Clear existing buttons, if any

        const currentDate = new Date();

        for (let i = 0; i < 3; i++) {
            const monthDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + i, 1);
            const month = monthDate.toLocaleString('default', {
                month: 'long'
            });
            const year = monthDate.getFullYear();

            const button = document.createElement('button');
            button.className = 'btn btn-outline-dark p-3 my-2';
            button.innerText = `${month} ${year}`;
            button.setAttribute('data-month', monthDate.getMonth());
            button.setAttribute('data-year', year);

            // Add click handler to update summary and highlight selected
            button.onclick = () => {
                const monthStr = `${month} ${year}`;
                selectMonth(monthStr);

                // Remove 'active' from all and add to clicked
                const allBtns = container.querySelectorAll('button');
                allBtns.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            };

            container.appendChild(button);
        }
    }

    function selectMonth(month) {
        document.getElementById('summaryDate').textContent = month;
        selectedMonth = month;
        updateSummaryTotal();
    }

    // room details for step-2
    function updateRoomDetails() {
        const select = document.getElementById('roomTypeSelect');
        const selectedOption = select.options[select.selectedIndex];
        const price = parseInt(selectedOption.getAttribute('data-price'));
        const type = selectedOption.value;

        // Store in hidden inputs
        document.getElementById('selectedRoomType').value = type;
        document.getElementById('selectedRoomPrice').value = price;

        // Update summary
        document.getElementById('summaryRoomType').innerHTML = `Room Type: ${type} - ₹${price}`;

        updateSummaryTotal();
    }


    // people count
    let prices = {
        adult: <?php echo $trip['price']; ?>,
        child: <?php echo $trip['price']; ?>,
        senior: <?php echo $trip['price']; ?>
    };

    function updateCount(type, delta) {
        let countSpan = document.getElementById(`${type}Count`);
        let count = parseInt(countSpan.textContent);
        count = Math.max(0, count + delta);
        countSpan.textContent = count;

        updateSummaryPeople();
        updateSummaryTotal();
    }

    function updateSummaryPeople() {
        let total =
            parseInt(document.getElementById('adultCount').textContent) +
            parseInt(document.getElementById('childCount').textContent) +
            parseInt(document.getElementById('seniorCount').textContent);

        document.getElementById('summaryPeople').textContent = total;
    }

    // Summary Update
    function updateSummaryTotal() {
        const roomPrice = parseInt(document.getElementById('selectedRoomPrice').value);
        const adults = parseInt(document.getElementById('adultCount').textContent);
        const children = parseInt(document.getElementById('childCount').textContent);
        const seniors = parseInt(document.getElementById('seniorCount').textContent);

        const peopleCost = (adults * prices.adult) + (children * prices.child) + (seniors * prices.senior);
        const total = roomPrice + peopleCost;
        const gst = Math.round(total * 0.05);

        const finalAmount = total + gst;

        document.getElementById('summaryGst').textContent = gst;
        document.getElementById('summaryTotal').textContent = finalAmount;
        document.getElementById('calculatedTotal').value = finalAmount;

        // Update hidden fields
        document.getElementById('hiddenTotalPeople').value = adults + children + seniors;
        document.getElementById('hiddenTripDate').value = document.getElementById('summaryDate').textContent;
        document.getElementById('hiddenGst').value = gst;
        document.getElementById('hiddenTotalAmount').value = finalAmount;
    }



    document.addEventListener('DOMContentLoaded', () => {
        updateRoomDetails();
        injectMonthButtons();
        updateSummaryPeople();
        updateSummaryTotal();
    });
    </script>



    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>