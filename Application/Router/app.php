<?php
use Centurion\Router\Router;
return (new Router(''))

    ->get('/', 'Main@main', ['name'=>'index'])

    ->get('/admin', 'Main@main', ['name'=>'admin'])

    ->group('/user', (new Router())

        ->get('/create/{numb}', 'Main@main', ['name'=>'test'])

    );
