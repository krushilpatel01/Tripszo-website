<?php
session_start();
include "components/config/config.php"; // DB connection

$error = '';
$success = '';
$show_form = false;

// Step 1: Validate Token from URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Step 2: Check if token is valid and not expired
    $stmt = $conn->prepare("SELECT * FROM user_table WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $show_form = true;
    } else {
        $error = "Invalid or expired token.";
    }
} else {
    $error = "No token provided.";
}

// Step 3: Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'], $_POST['confirm_password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
        $show_form = true;
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
        $show_form = true;
    } else {
        // Step 4: Update password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE user_table SET password = ?, reset_token = NULL, token_expiry = NULL WHERE id = ?");
        $update_stmt->bind_param("si", $hashed_password, $user_id);

        if ($update_stmt->execute()) {
            $success = "✅ Password updated successfully! You can now <a href='login.php'>login</a>.";
            $show_form = false;
        } else {
            $error = "Something went wrong. Please try again.";
            $show_form = true;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body { font-family: Arial; background: #f1f1f1; padding: 30px; }
        .box { background: #fff; padding: 20px; max-width: 400px; margin: auto; box-shadow: 0 0 10px #ccc; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; background: #28a745; color: #fff; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Reset Your Password</h2>

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success"><?= $success ?></div>
        <?php endif; ?>

        <?php if ($show_form): ?>
            <form method="POST" action="">
                <label>New Password:</label>
                <input type="password" name="password" required>

                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" required>

                <button type="submit">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
