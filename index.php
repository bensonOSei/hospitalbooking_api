<?php

declare(strict_types=1);

include_once "vendor/autoload.php";

set_exception_handler("\Benson\BookingApi\Exception\ErrorHandler::handleException");

use Benson\BookingApi\Authentication\Auth;
use Benson\BookingApi\Controllers\Customer;
use Benson\BookingApi\Validations\FormValidation;
use Bramus\Router\Router;

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");

$router = new Router();

$router->before('GET|POST|PUT|DELETE', '/api(/.*)?', function () {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Content-Type, X-API-KEY');
    # Check if the request is authorized
    if (Auth::getHeaders() === false) {
        http_response_code(401);
        echo json_encode(["message" => "Unauthorized"]);
        exit();
    }
});


$router->post("/api/register", function () {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $key = Auth::getHeaders();
        if (Auth::verifyApiKey($key)) {

            # Validate the data
            $data = new FormValidation($_POST, [
                "firstname" => "required|text",
                "lastname" => "required|text",
                "email" => "required|email",
                "phoneNumber" => "required|phone",
                "pswd" => "required|password"
            ]);

            # Check if the data is valid and return errors if data is invalid
            if ($data->hasErrors()) {
                $errors = $data->validate();
                http_response_code(400);
                echo json_encode(["message" => $errors]);
                exit();
            }

            # Sanitize the data
            $firstname = FormValidation::sanitizeText($_POST["firstname"]);
            $lastname = FormValidation::sanitizeText($_POST["lastname"]);
            $email = FormValidation::sanitizeEmail($_POST["email"]);
            $phoneNumber = FormValidation::sanitizePhoneNumber($_POST["phoneNumber"]);
            $password = $_POST["pswd"];

            # Create a new customer instance
            $customer = new Customer("users");
            $customer->setDetails(
                $firstname,
                $lastname,
                $email,
                $phoneNumber,
                $password
            );

            # Check if the user already exists
            if ($customer->isAvailable($email)) {
                http_response_code(409);
                echo json_encode(["message" => "User already exists"]);
                exit();
            }

            # Create the user
            if ($customer->signUp()) {
                http_response_code(201);
                echo json_encode(["message" => "User created successfully"]);
            } else {
                # Server error
                http_response_code(500);
                echo json_encode(["message" => "User not created"]);
            }
        } else {
            # Invalid API key
            http_response_code(401);
            echo json_encode(["message" => "Unauthorized"]);
            exit();
        }
    } else {
        # Wrong request method
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
    }
});


$router->get('/', function () {
    echo "Welcome to the Benson Booking API";
});


$router->set404('/api(/.*)?', function () {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});



$router->run();
