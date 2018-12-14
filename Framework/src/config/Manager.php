<?php
namespace App\phpappbuilder\config;

class Manager
{
    public function GetVendors(){}//Получить список вендоров
    public function GetApps($vendor){}//Получить список приложений вендора
    public function GetConfigs($app){}//Получить список конфигов приложения
}