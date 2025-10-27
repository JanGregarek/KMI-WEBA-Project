<?php
    include "views/common/head.html";
    include "views/common/nav_bar.php";
    require_once "models/database.php";

    
    $mysqli = connect_to_db();


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'];

        if ($username)
        {
            $query = $mysqli->prepare("SELECT * FROM registred WHERE email = ?");
            $query->bind_param("s", $username);
            $query->execute();

            $res = $query->get_result();
            $row = $res->fetch_assoc() ?? null;
            if ($row)
            {
                $pass_in_db = $row['password'];
                if (password_verify($password, $pass_in_db))
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['logged'] = true;
                    add_logged($mysqli, $username);
                }
                if ($row['admin'] === 1)
                {
                    $_SESSION['admin'] = true;
                }
            }
            disconnect($mysqli);
        }

        header("Location: " . ($_SESSION['logged'] ? "./dashboard" : "./login"));
        exit;
    }
    else
    {
        include 'views/login.html';
    }
?>