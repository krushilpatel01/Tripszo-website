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
    <title>Contact Us</title>
</head>

<body>
    <!-- hero banner with nav -->
    <?php include "components/header-footer/pages-header.php"; ?>
    <!-- header over -->

    <!-- contact us page start -->
    <section class="contact-page-wrapper">
        <div class="container">
            <div class="row contact-title">
                <div class="bg-blue"></div>
                <div class="col-12">
                    <h2>Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, doloribus. Voluptatum, quam? Dolore
                        possimus quos facere quibusdam, magni modi veniam.</p>
                </div>
            </div>
            <div class="row my-4 justify-content-between">
                <div class="col-sm-12 col-lg-9 contact-form">
                    <form action="" method="post">
                        <input type="text" name="name" id="" placeholder="Name">
                        <div class="conuntry-number d-flex">
                            <select name="country" id="code">
                                <option value="+91">+91</option>
                                <option value="+02">+02</option>
                                <option value="+23">+23</option>
                                <option value="+54">+54</option>
                                <option value="+67">+67</option>
                            </select>
                            <input type="number" name="number" id="number" placeholder="Number">
                        </div>
                        <input type="email" name="email" id="" placeholder="E-Mail">
                        <textarea name="subject" id="" placeholder="Message"></textarea>
                        <input type="submit" value="Send Message">
                    </form>
                </div>
                <div class="col-sm-12 col-lg-3 sign-up my-3">
                    <h3>Our Newsletter</h3>
                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quisquam ut
                        obcaecati
                        tenetur sint.
                        Pariatur repellendus esse deleniti asperiores nemo!</p>
                    <input type="email" name="email" id="" placeholder="sign up for Newsletter">
                    <input type="submit" value="Sign Up" id="sing-up-btn">
                </div>
            </div>
            <div class="row google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14823.928636014967!2d70.609782!3d21.742217349999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39581982a7062103%3A0xb31902f13b704fc7!2sVivah%20Party%20Plot%20Jetpur!5e0!3m2!1sen!2sin!4v1746205096071!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </section>

    <!-- footer addd -->
    <?php
  include "components/header-footer/footer.php";
 ?>