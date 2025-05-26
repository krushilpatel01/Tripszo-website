<?php

include "components/config/config.php"; // DB connection
session_start(); // start session for login

// for forgot password
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// for registation only
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Password match check
    if ($password !== $confirm_password) {
        $register_error = "Passwords do not match.";
    } else {
        // 2. Check for existing email
        $check_email = mysqli_query($conn, "SELECT * FROM user_table WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $register_error = "Email already exists.";
        } else {
            // 3. Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // 4. Insert user
            $query = "INSERT INTO user_table (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                $register_success = "Registration successful! You can now log in.";
            } else {
                $register_error = "Something went wrong. Please try again.";
            }
        }
    }
}

// for login process and go to index page
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 1. Check if email exists
    $query = "SELECT * FROM user_table  WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // 2. Verify password
        if (password_verify($password, $user['password'])) {
            // 3. Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // 4. Redirect to dashboard or home
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Email not found.";
    }
}

// for forgot password
if (isset($_POST['forgot'])) {

    $email = mysqli_real_escape_string($conn, $_POST['forgot_email']);
    $result = mysqli_query($conn, "SELECT * FROM user_table WHERE email = '$email'");
    
    if (mysqli_num_rows($result) > 0) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
        mysqli_query($conn, "UPDATE user_table SET reset_token='$token', token_expiry='$expiry' WHERE email='$email'");

        $reset_link = "http://localhost/Tripszo-website/Tripszo-website/reset-password.php?token=$token";

        // PHPMailer email sending
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'krushilchabhadiya600@gmail.com'; // your gmail
            $mail->Password   = 'shmm tehe esoq xiyw';   // your gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('krushilchabhadiya600@gmail.com', 'Tripszo Website Password Reset');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset Your Password';
            $mail->Body    = "Click the link to reset your password: <a href='$reset_link'>$reset_link</a>";

            $mail->send();
            $forgot_success = "A reset link has been sent to your email address.";
        } catch (Exception $e) {
            $forgot_error = "Failed to send email: {$mail->ErrorInfo}";
        }
    } else {
        $forgot_error = "Email not found in our database.";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login System</title>
    <!-- include css -->
    <?php
        include "components/css/css.php";
    ?>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-box">
            <div class="image-section">
                <div class="back-arrow" onclick="goBack()">←</div>
            </div>
            <div class="form-container2">

                <!-- Login Form -->
                <div id="loginForm" class="form-view active">
                    <h2>Welcome Back</h2>
                    <h3>Log in</h3>
                    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                    <form method="POST">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <span class="forgot-password" onclick="showForm('forgotForm')">Forgot Password?</span>
                        <button type="submit" name="login" class="btn-custom login-btn">LOG IN</button>
                    </form>
                    <button class="btn-custom google-btn">LOG IN WITH GOOGLE</button>
                    <div class="toggle-link" onclick="showForm('registerForm')">Don’t have an account? Create one</div>
                </div>


                <!-- Register Form -->
                <div id="registerForm" class="form-view">
                    <h2>Join Us</h2>
                    <h3>Create an account</h3>
                    <?php
    if (isset($register_error)) echo "<p style='color:red;'>$register_error</p>";
    if (isset($register_success)) echo "<p style='color:green;'>$register_success</p>";
    ?>
                    <form method="POST">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <input type="password" name="confirm_password" class="form-control"
                            placeholder="Confirm Password" required>
                        <button type="submit" name="register" class="btn-custom login-btn">REGISTER</button>
                    </form>
                    <div class="toggle-link" onclick="showForm('loginForm')">Already have an account? Log in</div>
                </div>


                <!-- Forgot Password Form -->
                <div id="forgotForm" class="form-view">
                    <h2>Reset Password</h2>
                    <h3>Enter your email</h3>
                    <?php
    if (isset($forgot_success)) echo "<p style='color:green;'>$forgot_success</p>";
    if (isset($forgot_error)) echo "<p style='color:red;'>$forgot_error</p>";
    ?>
                    <form method="POST">
                        <input type="email" name="forgot_email" class="form-control" placeholder="Email" required>
                        <button type="submit" name="forgot" class="btn-custom login-btn">SEND RESET LINK</button>
                    </form>
                    <div class="toggle-link" onclick="showForm('loginForm')">Back to Login</div>
                </div>


            </div>
        </div>
    </div>

    <script>
    function showForm(formId) {
        const forms = document.querySelectorAll('.form-view');
        forms.forEach(form => form.classList.remove('active'));
        document.getElementById(formId).classList.add('active');
    }

    function goBack() {
        window.history.back();
    }
    </script>

</body>

</html>