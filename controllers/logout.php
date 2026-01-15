<?php
    unset($_SESSION['username']);
    $_SESSION['logged'] = false;
    $_SESSION['admin'] = false;
    header("Location: " . BASE_URL . "/dashboard");
    exit;
?>