<?php
use Centurion\Router\Router;
return (new Router())

    ->get('/', 'Main@main', ['name'=>'index'])

    ->get('/domain', 'Main@main', ['name'=>'user'])

    ->group('/user', (new Router())

        ->get('/create/{numb}', 'Main@main', ['name'=>'test'])

    );
