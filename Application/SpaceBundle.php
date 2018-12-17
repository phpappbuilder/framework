<?php return [
    ["path" => 'collection/app/config/collection' , "name" => 'App config dir', "value" => ['prefix' => 'app', 'dir' => APP_DIR.'/Application/Config/'] ],
    ["path" => 'collection/app/migration/collection' , "name" => 'App migration dir', "value" => APP_DIR.'/Application/Database/Migration/' ],
    ["path" => 'collection/app/seeder/collection' , "name" => 'App seeder dir', "value" => APP_DIR.'/Application/Database/Seeder' ],
    ["Space" => APP_DIR.'/Application/Router/RouterBundle.php'],
    ["Space" => APP_DIR.'/Application/Console/CliBundle.php'],
    ["Space" => APP_DIR.'/Application/Cron/CronBundle.php'],
    ["Space" => APP_DIR.'/Application/Daemon/DaemonBundle.php'],
    ["Space" => APP_DIR.'/Application/Listener/ListenerBundle.php'],
];