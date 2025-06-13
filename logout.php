<?php
session_start();
session_unset();
session_destroy();

// Optional: Prevent browser caching this redirect
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Location: login.php");
exit();
