<?php
namespace Lib\AbstractObject;

/**
 * Интерфейс хранилища репозитория данных.
 *
 * Interface StorageInterface
 * @package Lib\AbstractObject
 */
interface StorageInterface {

    /**
     * StorageInterface constructor.
     *
     * @param array $config
     * @param string|NULL $id
     */
    public function __construct(array $config, string $id = NULL);

    /**
     * Получить объект родителя.
     *
     * @return object
     */
    public function getParent():object;

    /**
     * Получить генератор с дочерними объектами.( yield )
     *
     * @return \Generator
     */
    public function getChild():\Generator;

    /**
     * Возвращает свойство объекта.
     *
     * @param $name
     * @return string
     */
    public function __get($name):string;

    /**
     * Задает свойство объекта.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, string $value);

    /**
     * Возвращает массив со всеми свойствами объекта.
     *
     * @return array
     */
    public function getProperties():array;

    /**
     * Получить ID объекта.
     *
     * @return string
     */
    public function getId():string;

    /**
     * Вернуть имя объекта
     *
     * @return string
     */
    public function getName():string;

    /**
     * Задать имя объекту
     *
     * @param string $name
     */
    public function setName(string $name);

    /**
     * Возвращает контент объекта.
     *
     * @return string
     */
    public function getContent():string;

    /**
     * Задает содержимое контента.
     *
     * @param string $value
     */
    public function setContent(string $value);

    /**
     * Возвращает ID родителя.
     *
     * @return string
     */
    public function getParentId():string;

    /**
     * Задает ID родителя.
     *
     * @param string $value
     */
    public function setParentId(string $value);

    /**
     * Возвращает тип объекта
     *
     * @return string
     */
    public function getType():string;

    /**
     * Задает тип объекта
     *
     * @param string $value
     */
    public function setType(string $value);

    /**
     * Сохраняет изменения объекта.
     */
    public function save();

    /**
     * Создает новый объект.
     * Возвращает ID созданного объекта.
     *
     * @return string
     */
    public function saveNew():string;
}