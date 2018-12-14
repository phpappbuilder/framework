<?php
namespace App\phpappbuilder\object;


class ObjectContainer {
    private $object;
    public function __construct($class = RootObject::class, $data = []){
        $this->object = new $class($data);
    }

    public function getChilds()
    {
        return $this->object->getChilds();
    }

    public function getParent(){
        return $this->object->getParent();
    }

    public function __get($name){
        if (method_exists($this->object,))
        return new ObjectContainer($this->object->getChild($name)->className, $this->object->getChild($name)->data);
    }

    public function __set($name, $value){
        $this->object->addChild($name, $value);
    }

}