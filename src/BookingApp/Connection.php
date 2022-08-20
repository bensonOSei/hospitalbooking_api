<?php

namespace BookingApp\BookingApp;

use PDO;
use Dotenv\Dotenv;

class Connection
{
    private $host;
    private $user;
    private $password;
    private $db_name;

    protected function connect()
    {   
        $this->loadDotEnv();
        $this->host = $_ENV['SERVERNAME'];
        $this->user = $_ENV['USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->db_name = $_ENV['DB_NAME'];

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        try {

            $conn = new PDO($dsn, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (\PDOException $e) {

            echo "Error: " . $e->getMessage() . "<br>";
            die();

        }

        return $conn;
    }

    public function loadDotEnv()
    {
        $env_var = Dotenv::createImmutable(__DIR__);        
        $env_var->load();
    }

    
}
