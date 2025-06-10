<?php
include "../components/config/config.php";  // Your DB connection file

// Admin details
$email = "admin@example.com";       // Change this to your admin email
$password = "admin123";             // Change this to your desired password
$name = "Admin";                    // Admin name
$role = "admin";                    // Role

// Hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute insert query securely
$stmt = $conn->prepare("INSERT INTO admin_tbl (email, password, name, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $hashedPassword, $name, $role);

if ($stmt->execute()) {
    echo "Admin user created successfully!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>


<!-- add email password name and run in the terminal to add in the database -->