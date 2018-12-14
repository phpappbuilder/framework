<?php
namespace App\phpappbuilder\object;
use Space\Get as Space;

/**
 * all_except - все кроме
 * none_but - никто кроме
 * allowed - разрешить
 * banned - забанить
 * multiple => false - только один в коллекции
 */
final class Checking
{
    public $object='';
    public $all_except = [];
    public $none_but = [];
    public $none_but_null = false;
    public $allowed = [];
    public $banned = [];
    public $multiple = false;
    public $gitignored = false;

    public function __construct($class){
        $this->object=$class;
    }

    protected function setCheck($name, $value){
        if (is_array($value)){
            foreach($value as $class){
                if (!in_array($class, $this->{$name})){
                    $this->{$name}[] = $class;
                }
            }
        } else {
            if (!in_array($value, $this->{$name})){
                $this->{$name}[] = $value;
            }
        }
    }

    protected function getParent($class){
        $result = [];
        $collection = Space::Collection('phpappbuilder/object/checking_parent');
        if ($collection != null && is_array($collection) && count($collection)>0){
            foreach ($collection as $value){
                if ($value['object']==$class){
                    if (isset($value['all_except'])){$this->setCheck('all_except',$value['all_except']);}
                    if (isset($value['none_but']) or is_null($value['none_but'])){if($value['none_but']==null){$this->none_but_null=true;} else {$this->setCheck('none_but',$value['none_but']);}}
                    if (isset($value['allowed'])){$this->setCheck('allowed',$value['allowed']);}
                    if (isset($value['banned'])){$this->setCheck('banned',$value['banned']);}
                }
            }
        }
    }

    protected function getChild($class)
    {
        $result = [];
        $collection = Space::Collection('phpappbuilder/object/checking_child');
        if ($collection != null && is_array($collection) && count($collection) > 0) {
            foreach ($collection as $value) {
                if ($value['object'] == $class) {
                    if (isset($value['all_except'])) {
                        $this->setCheck('all_except', $value['all_except']);
                    }
                    if (isset($value['none_but']) or is_null($value['none_but'])) {
                        if ($value['none_but'] == null) {
                            $this->none_but_null = true;
                        } else {
                            $this->setCheck('none_but', $value['none_but']);
                        }
                    }
                    if (isset($value['allowed'])) {
                        $this->setCheck('allowed', $value['allowed']);
                    }
                    if (isset($value['banned'])) {
                        $this->setCheck('banned', $value['banned']);
                        if (isset($value['multiple']) && $value['multiple'] == true) {
                            $this->multiple = true;
                        }
                    }
                    if (isset($value['gitignored']) && $value['gitignored']==true){
                        $this->gitignored=true;
                    }
                }
            }
        }
    }

    protected function validCheck(){
        if( count($this->all_except)>0 && (count($this->none_but)>0 or $this->none_but_null) ){
            throw new \Exception("The check is only a 'all_except' or 'none_but' can be used");
        }
        if( count(array_intersect($this->allowed, $this->banned))>0 ){
            throw new \Exception("Values in an 'allowed' and 'banned' can not intersect");
        }
    }

    protected function finalCheck(){
        $this->validCheck();
        $status = 'ALL_';
        if (count($this->all_except)>0){
            $status = 'ALL_';
            return ['type'=>$status, 'banned'=>array_unique(array_merge($this->all_except , $banned))];
        } else {
            if (count($this->none_but)>0){
                $status = 'NONE_';

                return ['type'=>$status, 'allowed'=>array_unique(array_merge($this->none_but , $this->allowed))];
            } else {
                if ($this->none_but_null){
                    $status = 'NONE_';
                    return ['type'=>$status, 'allowed'=>$this->allowed];
                }
                return ['type'=>$status, 'banned'=>$this->banned];
            }
        }
    }

    public function isParent($check_class){
        $this->getParent($this->object);
        $final = $this->finalCheck();
        if ($final['type']=='ALL_') {
            if (!in_array($check_class, $final['banned'])){
                return true;
            } else {
                return false;
            }
        }
        if ($final['type']=='NONE_') {
            if (in_array($check_class, $final['allowed'])){
                return true;
            } else {
                return false;
            }
        }
    }

    public function isChild($check_class){
        $this->getChild($this->object);
        $final = $this->finalCheck();
        bdump($final, 'test');
        if ($final['type']=='ALL_') {
            if (!in_array($check_class, $final['banned'])){
                return true;
            } else {
                return false;
            }
        }
        if ($final['type']=='NONE_') {
            if (in_array($check_class, $final['allowed'])){
                return true;
            } else {
                return false;
            }
        }
    }


    protected function getList(){
        $collection = Space::Collection('phpappbuilder/object/object');
        if ($collection != null && is_array($collection) && count($collection)>0){
            return $collection;
        }
        return [];
    }

    /**
     * @return array
     */
    public function getParentList(): array
    {
        $this->getParent($this->object);
        $final = $this->finalCheck();
        $list = $this->getList();
        $result = [];
        if ($final['type']=='_ALL') {
            foreach($list as $value){
                if (!in_array($value, $final['banned'])){
                    $result[]=$value;
                }
            }
            return $result;
        }
        if ($final['type']=='_NONE') {
            foreach ($list as $value) {
                if (in_array($value, $final['allowed'])) {
                    $list[]=$value;
                }
            }
            return $list;
        }
    }

    /**
     * @return array
     */
    public function getChildList(): array {
        $this->getChild($this->object);
        $final = $this->finalCheck();
        $list = $this->getList();
        $result = [];
        if ($final['type']=='_ALL') {
            foreach($list as $value){
                if (!in_array($value, $final['banned'])){
                    $result[]=$value;
                    $this->validator->phpappbuilder->getChild()[3]->debug->BackTrace;
                }
            }
            return $result;
        }
        if ($final['type']=='_NONE') {
            foreach ($list as $value) {
                if (in_array($value, $final['allowed'])) {
                    $list[]=$value;
                }
            }
            return $list;
        }
    }

    public function getMultiple(){
        return $this->multiple;
    }
}