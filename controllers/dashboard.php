<?php
    require_once BASE_PATH . "/models/database.php";

    $mysqli = connect_to_db();
    $logged = get_recently_logged_users($mysqli);
    disconnect($mysqli);

    include_commons();
    include BASE_PATH . "/views/dashboard/dashboard.php";
?>