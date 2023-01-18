<?php

declare(strict_types=1);

namespace Benson\BookingApi\Models;

use Benson\BookingApi\config\Database;

class User extends Database 
{
    /**
     * The database connection
     * @var \PDO
     */
    private \PDO $conn;

    /**
     * The table to be used
     * @var string
     */
    private string $table;

    /**
     * The user's id
     * @var string
     */
    private string $id;

    /**
     * The user's firstname
     * @var string
     */
    private string $firstname;

    /**
     * The user's lastname
     * @var string
     */
    private string $lastname;

    /**
     * The user's email
     * @var string
     */
    private $email;

    /**
     * The user's phone number
     * @var string
     */
    private $phoneNumber;

    /**
     * The user's password
     * @var string
     */
    private string $password;

    /**
     * Token for the user during authentication
     * @var string
     */
    private string $token;

    /**
     * Constructor for the User Model class
     * @param mixed $table  The table to be used
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Generate a unique id for the user
     * @param string $prefix  Prefix for the id
     * @return string  The generated id
     */
    private function generateid(string $prefix): string
    {
        $this->id = uniqid($prefix);

        return $this->id;
    }

    protected function createUser($idPrefix, $firstname, $lastname, $email, $phoneNumber, $pswd): bool
    {
        $this->conn = $this->connect();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->password = $pswd;
        $id = $this->generateid($idPrefix);
        try {
            $sql = "INSERT INTO $this->table (
                id,firstname,lastname,email,phoneNumber,pswd
                ) VALUES (?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $id, $this->firstname, $this->lastname, $this->email,
                $this->phoneNumber, $this->password
            ]);
            $result = true;

        } catch (\PDOException $exception) {
            echo "Connection error: {$exception->getMessage()}";
            $result = false;
        }
        // $this->conn = null;
        return $result;
    }   

    /**
     * Query the user's email
     * @param string $email | The user's email
     * @return array|null | retuns the user's email if found or null if not found 
     */
    protected function getUserEmail(string $email): ?array
    {
        $this->email = $email;

        try {
            $sql = "SELECT * FROM $this->table WHERE email = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$this->email]);

            $result = $stmt->fetch();
        } catch (\PDOException $exception) {
            echo "Connection error:  . {$exception->getMessage()}";
        }

        return $result;
    }
}
