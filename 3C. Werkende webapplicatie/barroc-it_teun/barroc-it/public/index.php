<?php

if(empty($_SESSION['user'])) {
    header('location: views/auth/login.php');
} else {
    header('location: views/dashboard/dashboard.php');
}


