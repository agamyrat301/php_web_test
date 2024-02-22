<?php
        // Get the requested URL
        $request_uri = $_SERVER['REQUEST_URI'];
        session_start();
        require './app/init.php';
        // Extract the path from the URL
        $uri_parts = explode('?', $request_uri, 2);
        $path = $uri_parts[0];

        // Get the request method
        $request_method = $_SERVER['REQUEST_METHOD'];

        // Define routes with their corresponding controllers, methods, and HTTP methods
        $routes = [
            'GET' => [
                '/' => ['controller' => 'HomeController', 'method' => 'index'],
                '/auth/login' => ['controller' => 'AuthController', 'method' => 'login'],
                '/auth/logout' => ['controller' => 'AuthController', 'method' => 'logout'],
            ],
            'POST' => [
                '/auth/login' => ['controller' => 'AuthController', 'method' => 'postLogin'],
            ],
            // other routes here...
        ];

        // Check if the requested path exists in the routes array for the specified HTTP method
        if (isset($routes[$request_method]) && array_key_exists($path, $routes[$request_method])) {
            // Include the corresponding controller file
            include './app/controllers/' . $routes[$request_method][$path]['controller'] . '.php';

            // Instantiate the controller
            $controller = new $routes[$request_method][$path]['controller']();

            // Call the specified method of the controller
            $method = $routes[$request_method][$path]['method'];
            if (method_exists($controller, $method)) {
                ob_start();
                $controller->$method();
                $content = ob_get_clean();
            } else {
                // Method not found
                echo "404 Method Not Found";
            }
        } else {
            // Page not found
            echo "404 Not Found";
            $content = "404 Method Not Found";
        }

        echo $content;


        ?>