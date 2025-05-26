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



    <section class="book-your-slot my-5">
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
                    <hr style="width: 30px;">
                    <div class="step-box" onclick="goToStep(4)">Step 4</div>
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
                            <input type="text" placeholder="Number" class="form-input">
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
                        </div>

                        <input id="customBatch1" type="text" class="form-control mb-3"
                            placeholder="Or enter custom batch e.g. 1 DEC - 15 DEC" oninput="updateSummary()">

                        <input id="customBatch2" type="text" class="form-control mb-3"
                            placeholder="Or enter custom batch e.g. 16 DEC -  DEC" oninput="updateSummary()">

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
                    </div>

                    <!-- Right Section: Summary + Buttons -->
                    <div class="summary-box1 d-flex flex-column justify-content-between bg-light"
                        style="flex: 1; padding: 20px; border: 1px solid #ccc; border-radius: 8px; min-height: 300px; min-width: 0;">
                        <div>
                            <h5 class="font-weight-bold mb-3">Summary</h5>
                            <p><small>Selected Batch: <span id="summaryDate">Not selected</span></small></p>
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

            <!-- step-3 -->
            <div id="step3" class="form-section1">
                <div class="section-grid d-flex gap-3">
                    <!-- Left Form -->
                    <div class="form-container" style="flex: 1; min-width: 0;">
                        <h5 class="font-weight-bold">DESTINATION</h5>

                        <div class="text-end mb-3">
                            <button class="btn btn-outline-dark btn-sm">JUN</button>
                        </div>

                        <input type="text" class="form-control mb-3" placeholder="BATCH">
                        <input type="text" class="form-control mb-3" placeholder="CUSTOMER NAME">
                        <input type="text" class="form-control mb-3" placeholder="TRAVELLERS">

                        <h5 class="font-weight-bold mt-4">PAYMENT OPTIONS</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="bookingAmt"
                                value="booking" checked onclick="setPaymentOption('booking')">
                            <label class="form-check-label" for="bookingAmt">Booking Amount (₹3000)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="fullAmt" value="full"
                                onclick="setPaymentOption('full')">
                            <label class="form-check-label" for="fullAmt">Full Amount (₹12000)</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentOption" id="customAmt"
                                value="custom" onclick="setPaymentOption('custom')">
                            <label class="form-check-label" for="customAmt">Custom Amount</label>
                        </div>

                        <!-- Custom Amount Input -->
                        <input type="number" class="form-control mb-3" id="customAmountInput"
                            placeholder="Enter custom amount" style="display: none;" oninput="updatePayable()">
                    </div>

                    <!-- Right Summary Box + Buttons -->
                    <div class="summary-box bg-light p-3 rounded d-flex flex-column justify-content-between"
                        style="flex: 1; min-width: 0; min-height: 300px;">
                        <div>
                            <h5 class="font-weight-bold">Summary</h5>
                            <small>Double</small><br>
                            <small>GST</small>
                            <div class="amount-row mt-3 d-flex justify-content-between font-weight-bold">
                                <span>Payable Amt</span>
                                <span id="payableAmount">3000</span>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <button class="step-btn" onclick="goToStep(4)">Next</button>
                            <button class="btn btn-secondary btn-back-block w-50" onclick="goBack()">Back</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step4" class="form-section1">
                <div class="form-container-1 text-center">
                    <h4 class="font-weight-bold">Payment Completed</h4>
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
    const form1 = document.getElementById('form1');
    const errorMsg = document.getElementById('error-msg');

    form1.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const number = document.getElementById('number').value.trim();

        if (!name || !email || !number) {
            errorMsg.style.display = 'block';
        } else {
            errorMsg.style.display = 'none';
            goToStep(2);
        }
    });

    // Count Update for People
    const counts = {
        adult: 0,
        child: 0,
        senior: 0
    };

    function updateCount(type, delta) {
        counts[type] = Math.max(0, counts[type] + delta);
        document.getElementById(`${type}Count`).innerText = counts[type];
        updateSummary();
    }

    // Summary Update
    function updateSummary() {
        const totalPeople = counts.adult + counts.child + counts.senior;
        document.getElementById('summaryPeople').innerText = totalPeople;

        // Static pricing (example)
        const basePrice = 10000;
        const gstRate = 0.05;
        const gstAmount = basePrice * gstRate;
        const totalAmount = basePrice + gstAmount;

        document.getElementById('summaryGst').innerText = gstAmount.toFixed(0);
        document.getElementById('summaryTotal').innerText = totalAmount.toFixed(0);
    }

    // Payment Option Handler
    function setPaymentOption(option) {
        const customInput = document.getElementById('customAmountInput');
        const payableAmount = document.getElementById('payableAmount');

        if (option === 'booking') {
            customInput.style.display = 'none';
            payableAmount.innerText = '3000';
        } else if (option === 'full') {
            customInput.style.display = 'none';
            payableAmount.innerText = '12000';
        } else if (option === 'custom') {
            customInput.style.display = 'block';
            updatePayable();
        }
    }

    function updatePayable() {
        const customVal = document.getElementById('customAmountInput').value.trim();
        const payableAmount = document.getElementById('payableAmount');
        payableAmount.innerText = customVal ? customVal : '0';
    }

    // this is for month show 
    function injectMonthButtons() {
        const container = document.getElementById('monthButtons');
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

            button.onclick = () => {
                console.log(`Selected: ${month} ${year}`);
            };

            container.appendChild(button);
        }
    }

    document.addEventListener('DOMContentLoaded', injectMonthButtons);
    </script>


    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>