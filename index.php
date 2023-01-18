<?php

declare(strict_types=1);

include_once "vendor/autoload.php";

set_exception_handler("\Benson\BookingApi\Exception\ErrorHandler::handleException");

use Benson\BookingApi\Controllers\Customer;
use Benson\BookingApi\Validations\FormValidation;
use Bramus\Router\Router;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$router = new Router();

$router->post("/api/register", function () {
    $customer = new Customer("users");
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
        echo json_encode(["error"=>$errors]);
        exit();
    }

    $customer->setDetails(
        $_POST["firstname"],
        $_POST["lastname"],
        $_POST["email"],
        $_POST["phoneNumber"],
        $_POST["pswd"]
    );
    
    // if ($customer->signUp()) {
    //     echo json_encode(["message" => "User created successfully"]);
    // } else {
    //     echo json_encode(["message" => "User not created"]);
    // }
});

$router->set404('/api(/.*)?', function() {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});



$router->run();
