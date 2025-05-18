<?php
define('BASE_URL', '/Tripszo-website/Tripszo-website/admin/');
// Adjust if admin is in subfolder
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    :root {
        --main-color: #0C3EB2;
        --secondary-color: #ffffff;
    }

    body {
        background-color: #f8f9fa;
    }

    .sidebar {
        background-color: var(--main-color);
        min-height: 100vh;
    }

    .sidebar a {
        color: var(--secondary-color);
        text-decoration: none;
        display: block;
        padding: 12px 20px;
    }

    .sidebar a:hover,
    .sidebar .active {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .navbar {
        background-color: var(--main-color);
    }

    .navbar .navbar-brand,
    .navbar .nav-link,
    .navbar .text-white {
        color: var(--secondary-color) !important;
    }

    .content {
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">