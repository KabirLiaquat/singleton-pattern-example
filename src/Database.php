<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
    private static $instance = null;
    private $host;
    private $name;
    private $username;
    private $password;
    private $connection;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Database Connection Successful\n";
            } catch (PDOException $e) {
                die("Connection Failed: " . $e->getMessage());
            }
        }
        return $this->connection;
    }

    private function __clone()
    {
        throw new Exception("Clone can not be created for this class", 1);
    }

    public function __wakeup()
    {
        throw new Exception("Unserialization of the class is not allowd", 1);
    }
}
