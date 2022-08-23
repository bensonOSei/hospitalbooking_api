<?php

require_once '../vendor/autoload.php';

use BookingApp\BookingApp\Bookings\BookingCtr;

// Allow post request only
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: *");


$data = json_decode(file_get_contents("php://input"));

 $firstname = $data->fname;
 $lastname = $data->lname;
 $email = $data->email;
 $phone = $data->pnumber;
 $date = $data->date;
 $time = $data->time;
 $location = $data->location;

$bookme = new BookingCtr($date,$time,$firstname,$lastname,$email,$phone,$location);
// $bookme = new BookingCtr("2020-01-01","02:20","John","Quansah","Kbennysdhk","023343423","NYC");
 $result = $bookme->bookAppointment();

if(gettype($bookme->bookAppointment())== 'array'){
    echo json_encode($bookme->bookAppointment());
    exit();
} else {
    http_response_code(500);
    echo json_encode(['Error' => "something went wrong"]);
    exit();
}

