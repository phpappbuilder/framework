<?php
require __DIR__ . '/../bootstrap.php';

Tracy\Debugger::enable();

(new Centurion\App()) -> run();