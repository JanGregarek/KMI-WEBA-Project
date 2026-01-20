<?php
    require_once BASE_PATH . "/models/database.php";

    header("Content-Type: application/json");

    $mysqli = connect_to_db();
    $logged = get_recently_logged_users($mysqli);
    disconnect($mysqli);

    echo json_encode($logged);
?>