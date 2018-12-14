<?php
namespace App\phpappbuilder\helpers\Helpers;

use App\phpappbuilder\helpers\HelperInterface;
use App\phpappbuilder\template\Template as Templater;
use App\phpappbuilder\helpers\Template;

class Textarea implements HelperInterface
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
        return $tpl->render('helper/textarea', [
            'label'=>$label,
            'value'=>isset($this->data)?$this->data:null,
            'attr'=>array_merge([
                'name'=>$this->name,
                'class'=>'form-control',
                'placeholder'=>isset($this->params['placeholder'])?$this->params['placeholder']:null], $this->params)
        ]);
    }
}