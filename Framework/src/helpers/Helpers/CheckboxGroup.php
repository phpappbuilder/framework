<?php
namespace App\phpappbuilder\helpers\Helpers;

use App\phpappbuilder\helpers\HelperInterface;
use App\phpappbuilder\template\Template as Templater;
use App\phpappbuilder\helpers\Template;

class CheckboxGroup implements HelperInterface
{
    public $name = '';
    public $params = [];
    public $data = [];

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
        $data = (isset($this->params['data']) && is_array($this->params['data']))?$this->params['data']:null;
        $inputs='';
        foreach($data as $key => $value){
            $params = $this->params;
            if(isset($this->params['data'])){unset($params['data']);}
            if(in_array($key,$this->data)){$checked['checked']='';}else{$checked=[];}
            $inputs.=$tpl->render('helper/checkboxgroup/frame',[
                'attr'=>array_merge([
                    'name'=>$this->name.'[]',
                    'type'=>'checkbox',
                    'value'=>$key
                ],$params, $checked),
                'name'=>$value

            ]);
        }
        return $tpl->render('helper/checkboxgroup',['label'=>$label,'content'=>$inputs]);

    }
}