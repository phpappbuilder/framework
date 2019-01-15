<?php
namespace Lib\AbstractObject;


interface ObjectInterface
{
    /**
     * Возвращает favicon объекта
     *
     * @return string
     */
    public function icon():string;

    /**
     * Возвращает цвет иконки объекта (#******)
     *
     * @return string
     */
    public function color():string;

    /**
     * Возвращает название объекта
     *
     * @return string
     */
    public function name():string;

    /**
     * Возвращает описание объекта
     *
     * @return string
     */
    public function description():string;

    /**
     * Возвращает массив со свойствами
     * а так-же с валидаторами свойств
     *
     * @return array
     */
    public function properties():array;

    /**
     * Возвращает массив с классами объектов
     * которые могут быть его детьми
     *
     * @return array
     */
    public function child():array;

    /**
     * Возвращает массив с классами объектов
     * которые могут быть его родителем
     *
     * @return array
     */
    public function parent():array;
}