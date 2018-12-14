<?php
namespace App\Controller;

use Centurion\Controller\Controller;
use \Symfony\Component\HttpFoundation\Response;


class Main extends Controller
{
    public function main()
    {
        $this->response->setContent('<html><body><h1>Hello world.'.$this->arg['trans'].'</h1><a href="'.route('index').'">this route - '.$this->route.'</a></body></html>');
        $this->response->setStatusCode(Response::HTTP_OK);
        $this->response->headers->set('Content-Type', 'text/html');
        $this->response->send();

    }
}