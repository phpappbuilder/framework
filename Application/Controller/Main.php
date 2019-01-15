<?php
namespace App\Controller;

use Centurion\Controller\Controller;
use Phois\Whois\Whois;

class Main extends Controller
{
    public function main()
    {
        $domain = new Whois('thtythytyutytdytfyd.host');

        $whois_answer = nl2br($domain->info());
        bdump($domain->isAvailable());
        $this->response->setContent('<html><body><h1>Hello Slavike '.$domain->isAvailable().' </h1><a href="'.$this->route.'">this route - '.$this->route.'</a>
        <br>
        <span>'.$whois_answer.'</span>
</body></html>');
        $this->response->setStatusCode(200);
        $this->response->send();
    }
}