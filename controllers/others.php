<?php
    include "views/common/head.html";
    include "views/common/nav_bar.php";
    if ($_SESSION['logged'])
    {
        include 'views/common/nav_menu.php';
    }
    include 'views/others/others.html'
?>