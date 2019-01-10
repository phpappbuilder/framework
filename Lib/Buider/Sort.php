<?php
namespace Lib\Buider;


class Sort
{
    private $data = [];

    private $color = [];
    private $numbers = [];
    private $stack = [];

    public function __construct(array $data = []){
        $this->data = $data;
    }

    private function topological_sort(){
        foreach($this->data as $key => $value){
            if($this->dfs($key)) throw new \Exception('Cycle detected');
        }
        $keys = array_keys($this->data);
        $count = count($keys);
        for($i = 1;$i <= $count;$i++){
             $this->numbers[array_pop($keys)] = $i;
        }
        return true;
    }

    private function dfs(string $v){
        if($this->color[$v] == 1)return true;
        if($this->color[$v] == 2)return false;
        $this->color[$v] = 1;
        foreach ($this->data[$v] as $key => $value){
            if($this->dfs($value))return true;
        }
        $this->stack[] = $v;
        $this->color[$v] = 2;
        return false;
    }

    public function run(){
        $this->topological_sort();
        return $this->stack;
    }
}