<?php
include "components/config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id       = $_GET['trip_id'] ?? null;
    $name          = $_POST['name'] ?? '';
    $email         = $_POST['email'] ?? '';
    $number        = $_POST['number'] ?? '';
    $room_type     = $_POST['room_type'] ?? '';
    $room_price    = $_POST['room_price'] ?? '';
    $total_people  = $_POST['total_people'] ?? '';
    $gst           = $_POST['gst'] ?? '';
    $total_amount  = $_POST['total_amount'] ?? '';

    $sql = "INSERT INTO bookings (trip_id, name, email, phone, room_type, room_price, total_people, gst, total_amount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssiiid", $trip_id, $name, $email, $number, $room_type, $room_price, $total_people, $gst, $total_amount);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
