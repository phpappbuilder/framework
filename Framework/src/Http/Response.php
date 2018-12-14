<?php

namespace Centurion\Http;

use \Symfony\Component\HttpFoundation\Response as Resp;

class Response extends Resp
{
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

        return $this;
    }
}