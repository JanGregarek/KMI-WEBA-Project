<?php
    $email = $router['params'][0];
    print_r($email);
    $mysqli = connect_to_db();
    remove_user($mysqli, $email);
    disconnect($mysqli);
    header("Location: " . BASE_URL . "/users");
    exit();
?>