<?php

class Logger
{
    private static $instance = null;
    private $logFile;

    private function __construct()
    {
        $this->logFile = __DIR__ . '/../storage/logs/app.log';
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[$timestamp] $message\n", FILE_APPEND);
    }

    private function __clone()
    {
        throw new Exception("Clone can not be created for this class", 1);
    }

    public function __wakeup()
    {
        throw new Exception("Serialization can not be created for the class", 1);
    }
}
