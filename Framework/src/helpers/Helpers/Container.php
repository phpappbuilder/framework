<?php
namespace App\phpappbuilder\helpers\Helpers;

use App\phpappbuilder\helpers\HelperInterface;
use App\phpappbuilder\template\Template as Templater;
use App\phpappbuilder\helpers\Template;

class Container implements HelperInterface
{
    public $name = '';
    public $params = [];
    public $data = [];
    public $object = [];

    public function __construct($params){
        $this->params=$params;
        return $this;
    }

    public function setName($name)
    {
        $this->name=$name;
        return $this;
    }

    public function setData($value)
    {
        $this->data = $value;
        return $this;
    }

    public function setHelper($name, $object){
        $this->object[$name]=$object;
        return $this;
    }


    public function render(): string{
        $tpl = new Templater(Template::class);
        $content = '';
            foreach ($this->object as $key => $value) {
                $object = clone $value;
                $object->setName($this->name . '[' . $key . ']');
                bdump($this->data,'Data');
                if(isset($this->data[$key])){$object->setData($this->data[$key]);}
                $content .= $object->render();
                unset($object);
            }

        return $tpl->render('helper/container', [
            'content'=>$content,
            'name'=>isset($this->params['name'])?$this->params['name']:null
        ]);
    }
}