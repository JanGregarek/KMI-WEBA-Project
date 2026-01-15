<?php
    $_SESSION["action"] = $_SESSION["action"] ?? "";
    if ($router['method'] == '') {$router['method'] = 'get';}
    require_once BASE_PATH . "/models/database.php";
    $isAdmin = $_SESSION['admin'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        include_commons();

        $mysqli = connect_to_db();
        switch ($router['method'])
        {
            case 'get':
                $users = get_all_users($mysqli);
                break;

            case 'edit':
                $user = get_user($mysqli, $router['params'][0]);

                $formTitle = "Edit user";
                $formId = "edit-form";
                $formAction = BASE_URL . "/users/edit/" . $user["email"];
                
                $_SESSION["action"] = "edit";
                break;
            
            case 'add':
                $formTitle = "Add user";
                $formId = "add-form";
                $formAction = BASE_URL . "/users/add";
                $user = [
                    'first_name' => '',
                    'second_name' => '',
                    'email' => '',
                    'phone' => '',
                    'workplace' => '',
                    'note' => '',
                    'admin' => 0,
                ];

                $_SESSION["action"] = "add";
                break;

            default:
                break;
        }
        disconnect($mysqli);

        include BASE_PATH . "/views/$router[controller]/$router[method].php";
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $mysqli = connect_to_db();

        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $workplace = $_POST['workplace'];
        $note = $_POST['note'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $admin = $_POST['admin'];

        switch ($router['method'])
        {
            case 'add':
                add_user($mysqli, $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin);
                break;

            case 'edit':
                update_user($mysqli, $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin);
                break;

            default:
                break;
        }
        disconnect($mysqli);
        header("Location: " . BASE_URL . "/users");
        exit();
    }
?>