<?php
    error_reporting(0);
    session_start();

    unset($_SESSION['user_id']);
    session_destroy();
    header('Location: admin_login.php');

?>