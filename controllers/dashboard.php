<?php
    require_once "models/database.php";

    $mysqli = connect_to_db();
    $logged = get_recently_logged_users($mysqli);
    disconnect($mysqli);

    include "views/common/head.html";
    include "views/common/nav_bar.php";
    if ($_SESSION['logged'])
    {
        include 'views/common/nav_menu.php';
    }
    include 'views/dashboard/dashboard.php';
?>