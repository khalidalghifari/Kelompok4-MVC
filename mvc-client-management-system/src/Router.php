<?php

namespace App;

class Router
{
    private $routes = [];

    public function get($route, $controller, $method)
    {
        $this->addRoute('GET', $route, $controller, $method);
    }

    public function post($route, $controller, $method)
    {
        $this->addRoute('POST', $route, $controller, $method);
    }

    private function addRoute($httpMethod, $route, $controller, $method)
    {
        $this->routes[] = [
            'method' => $httpMethod,
            'route' => $this->prepareRoute($route),
            'controller' => $controller,
            'action' => $method,
        ];
    }

    private function prepareRoute($route)
    {
        return preg_replace('/{[^\/]+}/', '([^\/]+)', $route);
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($this->matchRoute($route, $uri, $method)) {
                return;
            }
        }

        $this->showNotFoundPage();
    }

    private function matchRoute($route, $uri, $method)
    {
        if ($route['method'] !== $method) {
            return false;
        }

        $routePattern = "@^" . $route['route'] . "$@";
        if (preg_match($routePattern, $uri, $matches)) {
            array_shift($matches); // Remove the full match from the beginning of the matches array
            $this->executeRoute($route, $matches);
            return true;
        }

        return false;
    }

    private function executeRoute($route, $params)
    {
        $controllerName = $route['controller'];
        $controller = new $controllerName();
        call_user_func_array([$controller, $route['action']], $params);
    }

    private function showNotFoundPage()
    {
        $htmlNotFound = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Not Found</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f5f5f5;
                    color: #333;
                    text-align: center;
                    padding: 50px;
                }

                h1 {
                    color: #d9534f;
                }

                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <h1>404 Not Found</h1>
            <p>The page you are looking for might be in another castle.</p>
        </body>
        </html>
HTML;
        echo $htmlNotFound;
    }
}
