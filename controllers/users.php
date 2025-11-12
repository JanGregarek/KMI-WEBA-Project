<?php
    include "views/common/head.html";
    include "views/common/nav_bar.php";
    require_once "models/database.php";
    if ($_SESSION['logged'])
    {
        include 'views/common/nav_menu.php';
    }

    $isAdmin = $_SESSION['admin'];
    if ($router['method'] == '') {$router['method'] = 'get';}
    switch ($router['method'])
    {
        case 'get':
            $mysqli = connect_to_db();
            $users = get_all_users($mysqli);
            disconnect($mysqli);
            break;

        case 'add':
            break;

        case 'edit':
            $mysqli = connect_to_db();
            $user = get_user($mysqli, $router['params'][0]);
            disconnect($mysqli);
            break;

        case 'delete':
            break;
    }
    include "views/$router[controller]/$router[method].php";
?>