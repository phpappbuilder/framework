<?php
namespace App\phpappbuilder\helpers\Helpers;

use App\phpappbuilder\helpers\HelperInterface;
use App\phpappbuilder\template\Template as Templater;
use App\phpappbuilder\helpers\Template;

class Color implements HelperInterface
{
    public $name = '';
    public $params = [];
    public $data = '';

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

    public function render(): string{
        $tpl = new Templater(Template::class);
        $label = isset($this->params['label'])?$this->params['label']:null;
        if(isset($this->params['label'])){unset($this->params['label']);}
        return $tpl->render('helper/input', [
            'label'=>$label,
            'attr'=>array_merge([
                'name'=>$this->name,
                'type'=>'color',
                'class'=>'form-control',
                'placeholder'=>isset($this->params['placeholder'])?$this->params['placeholder']:null ,
                'value'=>isset($this->data)?$this->data:null], $this->params)
        ]);
    }
}
{

}