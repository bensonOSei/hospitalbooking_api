<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

use Benson\BookingApi\config\Database;
use Bramus\Router\Router;

include_once "vendor/autoload.php";

// instantiate database and user object
$database = new Database();
$connection = $database = $database->connect();

$router = new Router();

$router->get('/', function () {
    echo "Welcome to the API";
});

$router->get("/hello/{id}", function($id) {
    echo "Welcome to the $id API";
});

$router->post("/login", function () use ($connection) {
    $user = new Benson\BookingApi\Models\User($connection);
});
// middleware


$router->run();