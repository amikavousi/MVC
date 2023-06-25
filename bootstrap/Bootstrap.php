<?php

class Bootstrap
{
    const NAMESPACE = 'App\\Controllers\\';

    public function __construct()
    {
        $dispatcher = require '../routes/web.php';

// Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                \App\Controllers\HomeController::notFound();
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                var_dump('500');

                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                $cm = explode('@', $handler);
                $className = static::NAMESPACE . $cm[0];
                $methodeName = $cm[1];
                  call_user_func(array(new $className, $methodeName), $vars);
                break;
        }
    }
}