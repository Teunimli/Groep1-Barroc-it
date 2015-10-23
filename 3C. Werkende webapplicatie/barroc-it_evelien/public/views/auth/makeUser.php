<?php require_once __DIR__ . '/../../../app/init.php';

$username = "Development";
$password = "Development";
$role_id = 3;

$hashed = password_hash($password, PASSWORD_DEFAULT);

$db->query("TRUNCATE TABLE users");

$sql = "INSERT INTO tbl_users (username, password, role_id) VALUES ('$username', '$hashed', '$role_id')";

$db->query($sql);

echo 'user is added to the database';

if (password_verify($password, $hashed)) {
    echo "<BR>";
    echo 'password is equal';
}