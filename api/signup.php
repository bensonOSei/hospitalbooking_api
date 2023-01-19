<?php

declare(strict_types=1);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

use Benson\BookingApi\Controllers\Customer;
use Benson\BookingApi\Validations\FormValidation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = new FormValidation($_POST, [
        "firstname" => "required|text",
        "lastname" => "required|text",
        "email" => "required|email",
        "phoneNumber" => "required|phone",
        "pswd" => "required|password"
    ]);

    $errorsCheck = $data->hasErrors();
    if (!$errorsCheck) {
        $errors = $data->validate();
        http_response_code(400);
        echo json_encode(["error" => $errors]);
        exit();
    }

    $firstname = FormValidation::sanitizeText($_POST["firstname"]);
    $lastname = FormValidation::sanitizeText($_POST["lastname"]);
    $email = FormValidation::sanitizeEmail($_POST["email"]);
    $phoneNumber = FormValidation::sanitizePhoneNumber($_POST["phoneNumber"]);
    $password = $_POST["pswd"];

    $customer = new Customer("users");

    $customer->setDetails(
        $firstname,
        $lastname,
        $email,
        $phoneNumber,
        $password
    );

    if ($customer->signUp()) {
        http_response_code(201);
        echo json_encode(["message" => "User created successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "User not created"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);
}
