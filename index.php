<?php
    // pro include / require
    define('BASE_PATH', __DIR__);

    // pro odkazy v HTML
    define('BASE_URL', '/KMI-WEBA-Project');

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

    function include_commons()
    {
        include BASE_PATH . "/views/common/head.html";
        include BASE_PATH . "/views/common/nav_bar.php";
        if ($_SESSION['logged'])
        {
            include BASE_PATH . "/views/common/nav_menu.html";
        }
    }
    
    session_start();
    $_SESSION['logged'] ??= false;
    $_SESSION['admin'] ??= false;
    $_SESSION['username'] ??= false;
    $router = process_URL();
    
    if (!$router['controller'])
    {
        include BASE_PATH . "/controllers/dashboard.php";
    }
    else
    {
        $path = BASE_PATH . "/controllers/" . $router["controller"] . ".php";
        if (file_exists($path))
        {
            include $path;
        }
        else
        {
            include BASE_PATH . "/controllers/404.php";
        }      
    }
?>