<?php
namespace App\phpappbuilder\helpers;

use App\phpappbuilder\template\Template as Templater;


class Form
{
    public $params=[];
    public $prefix='';
    protected $structure=[];
    protected $data=[];

    public function __construct($params){
        $this->params=$params;
        return $this;
    }

    public function setPrefix(string $prefix){
        $this->prefix=$prefix;
        return $this;
    }

    public function setHelper($name , $object){
        $this->structure[$name]=$object;
        return $this;
    }

    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    public function render(){
        $tpl = new Templater(Template::class);
        $this->params['content']='';

        foreach($this->structure as $key => $value){
            $object = clone $value;
            if($this->prefix!=''){$object->setName($this->prefix.'['.$key.']');}
            else {$object->setName($key);}

            if(isset($this->data[$key]) && !is_null($this->data[$key])){
                $object->setData($this->data[$key]);
            }
            $this->params['content'].=$object->render();
        }
        return $tpl->render('frame', $this->params);
    }
}

