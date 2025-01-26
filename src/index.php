<?php

require 'SessionManager.php';
require 'DatabaseLogger.php';

$session = SessionManager::getInstance();

if ($session->login('admin', 'password')) {
    echo "user loggedin successfully.\n";
} else {
    echo "Invalid username or password.\n";
}

$session->getUser();

$session->logout();
