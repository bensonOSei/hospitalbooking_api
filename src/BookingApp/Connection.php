<?php

namespace BookingApp\BookingApp;

use PDO;

class Connection {
    
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'booking_app_db';

    protected function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
        try {

            $conn = new  PDO($dsn,$this->user,$this->password);
            $conn->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch( \PDOException $e){

            echo "Error: ".$e->getMessage() ."<br>";  
            die();

        }
        
        return $conn;
    }
    
}
