<?php
namespace App\phpappbuilder\config;


interface ConfigInterface
{
    public function Set($config , $value);//Задать значение конфига
    public function Get($config);//Получить значение конфига
}