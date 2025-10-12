<?php
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../dashboard");
    exit;
?>