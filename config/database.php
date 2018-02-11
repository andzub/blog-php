<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','blogv');

function db_connect(){
    // Create connection
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // Check connection
    if ($conn->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    }

    $conn->set_charset('utf8');

    return $conn;
}