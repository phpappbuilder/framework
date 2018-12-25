<?php
namespace App\Controller;

use Centurion\Controller\Controller;

class Main extends Controller
{
    public function main()
    {
        $this->response->setContent('<html><body><h1>Hello world</h1><a href="'.$this->route.'">this route - '.$this->route.'</a></body></html>');
        $this->response->setStatusCode(200);
        $this->response->send();
    }
}