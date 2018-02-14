<?php

class Database
{
    private $conn;

    // вызываем подключение
    public function __construct()
    {
        $this->connect();
    }
    // создаем подключение
    public function connect()
    {
        if(isset($this->conn)) {
            return $this->conn;
        } else {
            // Create connection
            $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            // Check connection
            if ($conn->connect_errno) {
                echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
            }
            $conn->set_charset('utf8');
            return $conn;
        }
    }
}