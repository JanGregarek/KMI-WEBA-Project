<?php

function connect_to_db()
{
    return $mysqli = new mysqli("localhost", "root", "p[6Vo5gLiH9T@P(0", "users");
}

function disconnect($mysqli)
{
    $mysqli->close();
}

function get_all_users($mysqli)
{
    $res = $mysqli->query("SELECT * FROM registred");
    $users = $res->fetch_all(MYSQLI_ASSOC);
    return $users;
}

function get_user($mysqli, $email)
{
    $query = $mysqli->prepare("SELECT * FROM registred WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_assoc();
}

function get_recently_logged_users($mysqli)
{
    $res = $mysqli->query("SELECT email FROM logged LIMIT 10");
    $users = $res->fetch_all(MYSQLI_ASSOC);
    return $users;
}

function add_user($mysqli, $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin)
{
    $query = $mysqli->prepare("INSERT INTO registred VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssisssi", $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin);
    $query->execute();
}

function add_logged($mysqli, $email)
{
    $query = $mysqli->prepare("INSERT INTO logged VALUES (NOW(), ?)");
    $query->bind_param("s", $email);
    $query->execute();
}

function remove_user($mysqli, $email)
{
    $query = $mysqli->prepare("DELETE FROM registred WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
}

function update_user($mysqli, $first_name, $second_name, $email, $phone, $workplace, $note, $password, $admin)
{
    $query = $mysqli->prepare("UPDATE registred 
                                SET first_name = ?, second_name = ?, phone = ?, workplace = ?, note = ?, password = ?, admin = ? 
                                WHERE email = ?");
    $query->bind_param("ssisssis", $first_name, $second_name, $phone, $workplace, $note, $password, $admin, $email);
    $query->execute();
}

function verify_password($mysqli, $username, $password)
{
    $query = $mysqli->prepare("SELECT password FROM registred WHERE email = ?");
    $query->bind_param("s", $username);
    $query->execute();

    $res = $query->get_result();
    $row = $res->fetch_assoc();
    if ($row)
    {
        $pass_in_db = $row['password'];
        return password_verify($password, $pass_in_db);
    }
    return false;
}

function is_admin($mysqli, $username)
{
    $query = $mysqli->prepare("SELECT admin FROM registred WHERE email = ?");
    $query->bind_param("s", $username);
    $query->execute();

    $res = $query->get_result();
    $row = $res->fetch_assoc();
    if ($row)
    {
        return $row['admin'] === 1;
    }
    return false;
}

?>