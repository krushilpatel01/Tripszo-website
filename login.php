<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
    <div class="form-container">

      <!-- Login Form -->
      <div id="loginForm" class="form-view active">
        <h2>Welcome Back</h2>
        <h3>Log in</h3>
        <input type="email" class="form-control" placeholder="Email">
        <input type="password" class="form-control" placeholder="Password">
        <span class="forgot-password" onclick="showForm('forgotForm')">Forgot Password?</span>
        <button class="btn-custom login-btn">LOG IN</button>
        <button class="btn-custom google-btn">LOG IN WITH GOOGLE</button>
        <div class="toggle-link" onclick="showForm('registerForm')">Don’t have an account? Create one</div>
      </div>

      <!-- Register Form -->
      <div id="registerForm" class="form-view">
        <h2>Join Us</h2>
        <h3>Create an account</h3>
        <input type="text" class="form-control" placeholder="Full Name">
        <input type="email" class="form-control" placeholder="Email">
        <input type="password" class="form-control" placeholder="Password">
        <input type="password" class="form-control" placeholder="Confirm Password">
        <button class="btn-custom login-btn">REGISTER</button>
        <div class="toggle-link" onclick="showForm('loginForm')">Already have an account? Log in</div>
      </div>

      <!-- Forgot Password Form -->
      <div id="forgotForm" class="form-view">
        <h2>Reset Password</h2>
        <h3>Enter your email</h3>
        <input type="email" class="form-control" placeholder="Email">
        <button class="btn-custom login-btn">SEND RESET LINK</button>
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
