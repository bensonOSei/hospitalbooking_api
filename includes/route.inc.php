<?php
declare(strict_types = 1);

use BookingApp\BookingApp\Router;

require_once '../vendor/autoload.php';
/*
 *------------------------------------------------------------
 * This script routes the nav buttons and handles redirections 
 * -----------------------------------------------------------
 */

// $test = new Router("booking");
// $test->route();
 
if ($_SERVER['REQUEST_METHOD']=='GET') {

   $requestPath = parse_url($_SERVER['REQUEST_URI']);
   $splitPath = explode("/",$requestPath['path']);
   $pathLength = count($splitPath);

   if($pathLength >= 3 && $pathLength <= 5) :
      $router = new Router(end($splitPath));
      $router->route();
      // echo end($splitPath);
   else :
      echo "no";
   endif;

   echo $pathLength;

}

   
     


//  var_dump($routes[0]["name"]);