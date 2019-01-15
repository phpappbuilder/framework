<?php
use Centurion\Space\Get as Space;
use Centurion\Router\Url as Route;

function space(){
    return (new Space());
}

function route(string $route_name, array $params = [], bool $absolute = false){
    return Route::url($route_name, $params, $absolute);
}

function config(string $path = 'app'){
    $path = explode('.', $path);
    if(file_exists(APP_DIR.'/Application/Config/'.$path[0].'.php')){
        $file = require(APP_DIR.'/Application/Config/'.$path[0].'.php');
        array_shift($path);
        foreach($path as $value){
            if(isset($file[$value])){
                $file = $file[$value];
            } else {
                throw new Exception('Undefined config key');
            }
        }
        return $file;
    } else {
        throw new Exception('Undefined config file');
    }
}