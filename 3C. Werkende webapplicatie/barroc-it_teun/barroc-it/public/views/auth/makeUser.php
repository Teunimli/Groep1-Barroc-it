<?php require_once __DIR__ . '/../../../app/init.php';

$username = "Admin";
$password = "Admin";


$hashed = password_hash($password, PASSWORD_DEFAULT);

$db->query("TRUNCATE TABLE users");

$sql = "INSERT INTO tbl_users (username, password) VALUES ('$username', '$hashed')";

$db->query($sql);

echo 'user is added to the database';

if (password_verify($password, $hashed)) {
    echo "<BR>";
    echo 'password is equal';
}