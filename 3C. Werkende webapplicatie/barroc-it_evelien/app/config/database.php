<?php

$dsn = 'mysql:host=localhost;dbname=barroc_it';
$username = 'root';
$password = 'root';          // let op met wamp!!!!±!

try {
$db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}
