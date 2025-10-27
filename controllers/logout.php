<?php
    include "views/common/head.html";
    include "views/common/nav_bar.php";
    if ($_SESSION['logged'])
    {
        include 'views/common/nav_menu.php';
    }
    
    $confirm = $router['method'];

    if ($confirm && $confirm == 1)
    {
        unset($_SESSION['username']);
        $_SESSION['logged'] = false;
        $_SESSION['admin'] = false;
        header("Location: ../dashboard");
        exit;
    }
    else
    {
        include 'views/logout.html';
    }
?>