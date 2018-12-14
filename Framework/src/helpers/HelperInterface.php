<?php
namespace App\phpappbuilder\helpers;

interface HelperInterface
{
    public function __construct($params);
    public function setName($name);
    public function setData($value);
    public function render():string ;
}