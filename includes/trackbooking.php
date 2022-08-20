<?php

require_once  ("../vendor/autoload.php");

use BookingApp\BookingApp\Bookings\BookingView;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$result;
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["track"])) {
    $booking_id = $_GET['track'];

    $trackId = new BookingView($booking_id);
    $result = $trackId->trackBooking();

    if ($result === false) {
        http_response_code(404);
        echo json_encode(["message" => "user not found"]);
        exit();
    }
} else {
    $result = array('message' => "method not allowed");
}

echo json_encode($result);
