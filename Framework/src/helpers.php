<?php
use Centurion\Space\Get as Space;
use Centurion\Router\Url as Route;

function space(){
    return (new Space());
}

function route(string $route_name, array $params = [], bool $absolute = false){
    return Route::url($route_name, $params, $absolute);
}