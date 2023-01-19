<?php

declare(strict_types=1);

namespace Benson\BookingApi\config;

use Dotenv\Dotenv;

class Database 
{
    /**
     * The database host
     * @var string
     */
    private string $host;

    /**
     * The database name
     * @var string
     */
    private string $dbName;

    /**
     * The database username
     * @var string
     */
    private string $dbUsername;

    /**
     * The database password
     * @var string
     */
    private string $dbPassowrd;


    /**
     * Getting the environment variables
     * @param string $key | The key to be used. The key is the name of the environment variable
     * @return string | The value of the environment variable
     */
    private function getDotEnv(string $key): string
    {
        $dotEnv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotEnv->load();
        return $_ENV[$key];
    }

    /**
     * Creating a connection to the database
     * @return \PDO
     */
    protected function connect(): \PDO
    {
        $this->host = $this->getDotEnv("DB_HOST");
        $this->dbName = $this->getDotEnv("DB_NAME");
        $this->dbUsername = $this->getDotEnv("DB_USERNAME");
        $this->dbPassowrd = $this->getDotEnv("DB_PASSWORD");

        try {
            $conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassowrd);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $result = $conn;
       
        } catch (\PDOException $exception) {
            echo "Connection error:  . {$exception->getMessage()}";
        }

        $conn = null;
        return $result;
    }
}
