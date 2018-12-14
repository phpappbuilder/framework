<?php

namespace Centurion\Space;

class Get
{

    public $temp = APP_DIR.'/Runtime/Space' ;

    //Возвращает значение ключа
    public function Key( $path ) {

        $space = explode ("/",$path);
        if (is_file($this->temp.'/'.$space['0'].'/'.$space['1'].'/key/'.$space['2'].'/value.php')) {
            return require ($this->temp.'/'.$space['0'].'/'.$space['1'].'/key/'.$space['2'].'/value.php');
        }
        return null;
    }

    //возвращает коллекцию
    public function Collection( $path ) {

        $space = explode ("/",$path);
        if (is_file($this->temp.'/'.$space['0'].'/'.$space['1'].'/collection/'.$space['2'].'/return.php')) {
            return require ($this->temp.'/'.$space['0'].'/'.$space['1'].'/collection/'.$space['2'].'/return.php');
        }
        return null;
    }

}