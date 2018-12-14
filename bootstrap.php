<?php
define('APP_START', microtime(true));
define('APP_DIR', __DIR__);
require __DIR__.'/vendor/autoload.php';

use App\phpappbuilder\router\App;
use Tracy\Debugger;

Debugger::enable();

return (new Centurion\Router\App());