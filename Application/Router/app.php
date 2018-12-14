<?php
use Centurion\Router\Router;
return (new Router('RouterPrefix'))

    ->get('/', 'Main@main', ['name'=>'index'])

    ->get('/admin', 'Main@main', ['name'=>'admin']);
