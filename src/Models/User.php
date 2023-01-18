<?php
declare(strict_types=1);

namespace Benson\BookingApi\Models;

class User 
{
    private $conn;
    private $table = "users";
    public $id;
    public $name;
    public $email;
    public $password;
    public $token;


    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }


}