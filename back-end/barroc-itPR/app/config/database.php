<?php

$dsn = 'mysql:host=localhost;dbname=barroc_it';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}

