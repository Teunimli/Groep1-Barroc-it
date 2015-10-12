<?php
require_once '../../header.php';
echo 'dashboard';
?>

<form action="../../../app/controllers/authController.php" method="POST">
    <h2 class="text-center">Logout</h2>
    <input type="hidden" name="type" value="logout">
    <input type="submit" value="Logout">
</form>

