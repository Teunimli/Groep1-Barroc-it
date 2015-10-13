<?php
require_once __DIR__ . '/../init.php';

switch( $_POST['type'] ) {

    case 'login' :
        login($_POST['username'],
            $_POST['password'],
            $db);

        if(session_start()) {
            header('location:' . HTTP . '/public/views/dashboard/dashboard.php');
        }
        break;
    case 'logout' :
        logout();
        break;

}


function alert($string)
{
    echo '<script type="text/javascript">alert("' . $string . '");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
}

function login($username, $password, $db) {

    if(empty($username) ||
        empty($password)) {
        $notFilled = 'data is incomplete';
        alert($notFilled);
    }

    $sql = "SELECT * FROM tbl_users WHERE username = :username";
    $q = $db->prepare($sql);
    $q->bindParam(':username', $username);
    $q->execute();
    // kijkt of de rij al bestaat
    if ($q->rowCount() > 0) {
        $user = $q->fetch();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];
           // session_destroy();
           // session_unset();
        }
    } else {
        $exists = 'user does not excist';
        alert($exists);
    }

    return true;







}

function logout() {
    session_destroy();
    session_unset();
    $logout = "Logout succesfull";
    alert($logout);
    header('location:' . HTTP . '/public/views/auth/login.php');
}