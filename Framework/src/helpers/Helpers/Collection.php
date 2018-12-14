<?php
namespace App\phpappbuilder\helpers\Helpers;

use App\phpappbuilder\helpers\HelperInterface;
use App\phpappbuilder\template\Template as Templater;
use App\phpappbuilder\helpers\Template;

class Collection implements HelperInterface
{
    public $name = '';
    public $params = [];
    public $data = [];
    public $object = [];
    public $first_collection = true;
    public $number = 0;

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
        sort($this->data);
        return $this;
    }

    public function setHelper($name, $object){
        $this->object[$name]=$object;
        return $this;
    }

    public function recursiveCollectionsCount()
        {
            $status = false;
            foreach($this->object as $value){
                if(get_class($this)==get_class($value)){
                    $status=true;
                }
            }
            return $status;
        }

    public function getChild(){
        $bundle = [];
        foreach($this->object as $value){
            if (get_class($this)==get_class($value)){
                $bundle[]=$value;
            }
        }
    }

    public function recurs($collection){
        $count=[];
        if (!empty($collection)) {
            foreach ($collection as $value) {
                if (get_class($this) == get_class($value)) {
                    if ($value->recursiveCollectionsCount()) {
                        $count[] = 1 + $this->recurs($value->getChild());
                    } else {
                        $count[] = 1;
                    }
                }
            }
        } else {
            return 1;
        }
        if (count($count)>0) {return max($count);}
        else {return 0;}

    }

    public function setChild($number){
        $this->first_collection = false;
        $this->number = $number+1;
        return $this;
    }

    protected function getCollectionsNumb(){
        foreach($this->object as $value){
            if(get_class($this)==get_class($value)){
                $value->setChild($this->number);
                $value->getCollectionsNumb();
            }
        }
    }

    public function render(): string{
        $tpl = new Templater(Template::class);
        $count=count($this->data);
        $last_id=$count-1;
        $this->getCollectionsNumb();
        $content = '';
        for ($i=0;$i<$count;$i++) {
            $frame_item = '';
            foreach ($this->object as $key => $value) {
                $object = clone $value;
                $object->setName($this->name . '[' . $i . ']' . '[' . $key . ']');
                if(isset($this->data[$i][$key])){$object->setData($this->data[$i][$key]);}
                $frame_item .= $object->render();
                unset($object);
            }
            $content.= $tpl->render('helper/collection/frame', ['content' => $frame_item]);
        }

        $frame_item = '';
        foreach ($this->object as $key => $value) {
            $value->setName($this->name . '[' . '<%=id_'.$this->number.'%>' . ']' . '[' . $key . ']');
            $frame_item .= $value->render();
        }
        $template= $tpl->render('helper/collection/frame', ['content' => $frame_item]);

        return $tpl->render('helper/collection', [
            'number'=>$this->number,
            'count'=>$this->recurs($this->object),
            'last_id'=>$last_id,
            'JsTemplater'=>str_replace (['<','>','"',"'"],['{{!S!S!S!S!}}','{{!K!S!S!J!}}','{{!P!S!S!T!}}','{{!D!S!S!F!}}'],$template),
            'content'=>$content,
            'name'=>isset($this->params['name'])?$this->params['name']:null,
            'description'=>isset($this->params['description'])?$this->params['description']:null
        ]);
    }
}
