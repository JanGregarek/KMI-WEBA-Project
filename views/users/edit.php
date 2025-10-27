<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $workplace = $_POST['workplace'];
        $note = $_POST['note'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $admin = $_POST['admin'];

        $mysqli = connect_to_db();
        update_user($mysqli, $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin);
        disconnect($mysqli);
        header("Location: users");
        exit();
    }
    else
    {
        include "form.php";
    }
?>