<?php

require 'Database.php';

class DatabaseLogger
{
    private static $instance = null;
    private $logFile;
    private $connection;

    private function __construct()
    {
        $this->logFile = __DIR__ . '/../storage/logs/app.log';
        $this->connection = Database::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DatabaseLogger(); // Corrected class name
        }

        return self::$instance;
    }

    public function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[$timestamp] $message\n", FILE_APPEND);

        $stmt = $this->connection->prepare("INSERT INTO logs (message, created_at) VALUES (:message, :created_at)");
        $stmt->execute([':message' => $message, ':created_at' => $timestamp]);
    }

    private function __clone()
    {
        throw new Exception("Cloning of this class is not allowed");
    }

    public function __wakeup()
    {
        throw new Exception("Serialization of this class is not allowed");
    }
}
