<?php
    include "views/common/head.html";
    include "views/common/nav_bar.php";
    if ($_SESSION['logged'])
    {
        include 'views/common/nav_menu.php';
    }
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
    <body>
        <h1 class="pb-3 border-bottom">Page not found</h1>
    </body>
</main>