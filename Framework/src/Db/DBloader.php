<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

foreach (config('app.db') as $key => $value){
    $capsule->addConnection($value, $key);
}

$capsule->setAsGlobal();
