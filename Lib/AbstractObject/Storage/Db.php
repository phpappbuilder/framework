<?php
namespace Lib\AbstractObject\Storage;

use Lib\AbstractObject\Storage\Db\Model;
use Lib\AbstractObject\StorageInterface;
use Lib\AbstractObject\RootObject;

class Db implements StorageInterface{

    private $id = NULL;
    private $parent_id = '';
    private $name = '';
    private $content = '';
    private $type = RootObject::class;
    private $properties = [];
    private $config;

    public function __construct($config, $id = NULL) {

        if ($id != NULL){
            $model = Model::find($id)->toArray();
            $this->id = $model['id'];
            $this->parent_id = $model['parent_id'];
            $this->name = $model['name'];
            $this->content = $model['content'];
            $this->type = $model['type'];
            $this->properties = json_decode($model['properties']);
        } else {
            $this->id = NULL;
            $this->parent_id = NULL;
            $this->name = 'RootObject';
            $this->content = '';
            $this->type = RootObject::class;
            $this->properties = [];
        }
        $this->config = $config;
    }

    public function __get($name):string {
        if (isset($this->properties[$name])){
            return $this->properties[$name];
        } else {
            throw new \Exception('Undefined object prop');
        }
    }

    public function __set($name, string $value) {
        if (isset($this->properties[$name])){
            $this->properties[$name] = $value;
        } else {
            throw new \Exception('Undefined object prop');
        }
    }

    public function getChild(): \Generator {
        foreach(Model::select('id')
                    ->where(['parent_id', $this->id])
                    ->get()
                    ->toArray() as $value){
            yield new Db($this->config, dbModel::find($value)['id']);
        }
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getParent(): object {
        return new Db($this->config, $this->parent_id);
    }

    public function getParentId(): string {
        return $this->parent_id;
    }

    public function setParentId(string $value) {
        $this->parent_id = $value;
    }

    public function getProperties(): array {
        return $this->properties;
    }

    public function setProperties(string $properties) {
        $this->properties = $properties;
    }

    public function setContent(string $value) {
        $this->content = $value;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getType():string{
        return $this->type;
    }

    public function setType(string $value){
        $this->type = $value;
    }

    public function save() {
        $model = Model::find($this->id);
        $model->name = $this->name;
        $model->parent_id = $this->parent_id;
        $model->content = $this->content;
        $model->type = $this->type;
        $model->properties = json_decode($this->properties);
        $model->save();
    }

    public function saveNew(): string {
        $model = new Model();
        $model->name = $this->name;
        $model->parent_id = $this->parent_id;
        $model->content = $this->content;
        $model->type = $this->type;
        $model->properties = json_decode($this->properties);
        return $model->save();
    }
}