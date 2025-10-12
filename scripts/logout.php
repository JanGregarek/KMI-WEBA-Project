<?php
    session_start();
    unset($_SESSION['username']);
    $_SESSION['logged'] = false;
    header("Location: ../dashboard");
    exit;
?>