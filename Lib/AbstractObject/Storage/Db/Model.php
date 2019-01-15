<?php
namespace Lib\AbstractObject\Storage\Db;

use Illuminate\Database\Eloquent\Model as eModel;

class Model extends eModel
{
    public $table = 'object';
    public $timestamps = false;
}