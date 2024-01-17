<?php

namespace src\core;

use src\core\RouteNotFoundException;

class Route
{
    protected array $routes;

    public function register(string $route, $action): self
    {
        if (!is_callable($action) && !is_array($action)) {
            throw new RouteNotFoundException();
        }
    
        $this->routes[$route] = $action;
        return $this;
    }
    public function resolve(string $requestUrl)
    {
        $route = explode('?', $requestUrl)[0];

        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}
