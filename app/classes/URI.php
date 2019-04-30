<?php


namespace app\classes;

class URI
{
    public static function load(Type $var = null)
    {
        return $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}