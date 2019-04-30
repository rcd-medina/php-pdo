<?php

namespace app\classes;

class Routes
{
    public static function load($routes, $uri)
    {
        if (! array_key_exists($uri, $routes)) {
            throw new \Exception("A rota {$uri} não existe!");
        }

        return "../app/{$routes[$uri]}";
    }
}

