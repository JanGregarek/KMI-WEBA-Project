<?php
    $base_path = $_SERVER['HTTP_HOST'];

    function process_URL()
    {
        $URL = explode('/', $_GET['page'] ?? '');
        $controller = $URL[0] ?? null;
        $method = $URL[1] ?? null;
        $num_of_params = count($URL);
        $params = [];
        for ($i = 2; $i < $num_of_params; $i++) {
            $params[] = $URL[$i] ?? null;
        }
        return ['controller' => $controller, 
                'method' => $method,
                'params' => $params];
    }
    
    session_start();
    $_SESSION['logged'] ??= false;
    $_SESSION['admin'] ??= false;
    $_SESSION['username'] ??= false;
    $router = process_URL();
    
    if (!$router['controller'])
    {
        include "controllers/dashboard.php";
    }
    else
    {
        if (file_exists('controllers/' . $router['controller'] . ".php"))
        {
            include "controllers/" . $router['controller'] . ".php";
        }
        else
        {
            include "controllers/404.php";
        }      
    }
?>