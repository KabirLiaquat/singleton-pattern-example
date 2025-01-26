<?php

class SessionManager
{
    private static $instance = null;
    private $user = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new SessionManager();
        }

        return self::$instance;
    }

    public function login($username, $password)
    {
        if ($username === 'admin' && $password === 'password') {
            $this->user = ['username' => $username, 'role' => 'admin'];
            DatabaseLogger::getInstance()->log("User $username logged in");
            return true;
        }

        DatabaseLogger::getInstance()->log("Failed login attemt for $username.");
        return false;
    }

    public function logout()
    {
        if ($this->user) {
            DatabaseLogger::getInstance()->log("User '{$this->user['username']}' logout successfully");
            $this->user = null;
        }
    }

    public function getUser()
    {
        if ($this->user) {
            DatabaseLogger::getInstance()->log("Current User: " . json_encode($this->user));
            return $this->user;
        }
    }

    private function __clone()
    {
        throw new Exception("Cloning of the class is not allowd", 1);
    }

    public function __wakeup()
    {
        throw new Exception("Unserialization of the class is not allowd", 1);
    }
}
