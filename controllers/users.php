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
            include "views/$router[controller]/$router[method].php";
            break;

        case 'add':
            include "views/$router[controller]/$router[method].php";
            break;

        case 'edit':
            include "views/$router[controller]/$router[method].php";
            break;
        
        case 'delete':
            include "views/$router[controller]/$router[method].php";
            break;
    }

?>