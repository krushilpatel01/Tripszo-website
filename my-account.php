<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

    include "components/config/config.php"; // adjust path as needed


// Get logged-in user info
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user_table WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <?php include "components/css/css.php"; ?>
</head>

<body>

    <?php include "components/header-footer/pages-header.php"; ?>

    <section class="container py-5">
        <h2 class="text-center mb-4">My Account</h2>

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Welcome, <?= htmlspecialchars($user['name']) ?>!</h5>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
                <!-- Add more user fields if needed -->

                <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
            </div>
        </div>
    </section>

    <?php include "components/header-footer/footer.php"; ?>

</body>

</html>