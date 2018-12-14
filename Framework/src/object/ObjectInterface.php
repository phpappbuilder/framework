<?php
namespace App\phpappbuilder\object;


interface ObjectInterface
{
    public function getStructure(); //Хелпер для объекта
    public function getName(); //Возвращает название типа объекта
    public function getIcon(); //Возвращает иконку объекта
    public function getDescription(); //Возвращает описание объекта

    public function getChilds();
    public function getParent();

    public function addObject();
    public function removeObject();

    public function getData();
    public function

}