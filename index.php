<?php
    session_start();
    $_SESSION['logged'] ??= false;
    $URL = $_GET['page'] ?? 'dashboard';
    if ($URL === '') {$URL = 'dashboard';}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Simple Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./visual/bootstrap.css">
  <link rel="stylesheet" href="./visual/bootstrap-icons.css">
</head>

<style>
/* some hacks for responsive sidebar */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 100;
  padding: 48px 0 0; /* height of navbar */
}

.sidebar-sticky {
  height: calc(100vh - 48px);
  overflow-x: hidden;
  overflow-y: auto;
}
</style>

<?php
    include 'components/nav_bar.php';
    include 'components/nav_menu.php';

    switch($URL)
    {
        case 'dashboard':
            include 'pages/dashboard.html';
            break;
        case 'items':
            include 'pages/items.html';
            break;
        case 'others':
            include 'pages/others.html';
            break;
        case 'users':
            include 'pages/users.html';
            break;
        case 'login':
            include 'pages/login.html';
            break;
        case 'logout':
            include 'pages/logout.html';
            break;
        case 'administration':
            if ($_SESSION['logged'])
            {
              include 'pages/administration.php';
            }
            else
            {
              include 'pages/not_logged.html';
            }
            break;
        default:
            include 'pages/404.html';
            break;
    }
?>
</html>