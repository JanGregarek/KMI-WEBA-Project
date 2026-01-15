<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($username && $password)
        {
            require_once BASE_PATH . "/models/database.php";
            $mysqli = connect_to_db();
            $password_correct = verify_password($mysqli, $username, $password);
            if ($password_correct)
            {
                $_SESSION['logged'] = true;
                add_logged($mysqli, $username);
                $_SESSION['admin'] = is_admin($mysqli, $username);
                header("Location: " . BASE_URL . "/dashboard");
            }
            else
            {
                header("Location: " . BASE_URL . "/login");
            }
            disconnect($mysqli);
        }
        exit;
    }
    else
    {
        include_commons();
        include BASE_PATH . "/views/login.html";
    }
?>