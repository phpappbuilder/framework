<?php
/**
 * Created by PhpStorm.
 * User: server
 * Date: 12.01.19
 * Time: 16:19
 */

namespace Lib\AbstractObject;


class Manager
{
    /**
     * @return \Generator
     */
    public function ggg(){
        for($i=0;$i<=10;$i++){
            yield $i;
        }
    }
}