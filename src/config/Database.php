<?php

namespace Benson\BookingApi\config;

class Database
{
    private const HOST = "127.0.0.1";
    private const DB_NAME = "appointment_booking";
    private const USERNAME = "root";
    private const PASSWORD = "";
    private $conn;

    // DB Connect

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new \PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USERNAME, self::PASSWORD);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $exception) {
            echo "Connection error:  . {$exception->getMessage()}";
        }

        return $this->conn;
    }
}
