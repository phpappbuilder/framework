<?php

namespace App\phpappbuilder\template;
use Tracy\Debugger;


class Template {

    private $class;

    public function __construct($class) {
        $this->class = new $class();
    }

    private function _exist($tpl){
        $class = get_parent_class($this->class);//Нужно вникнуть!!!
        if (file_exists($this->class->path.'/'.$tpl.'.php'))
            {
                return $this->class->path.'/'.$tpl.'.php';
            }
        else
            {
                if (!$class)
                {

                    exit("This template does not exist [".$this->class->path.'/'.$tpl.'.php'."]");
                    //throw new TemplateException("This template does not exist [".$this->class->path.'/'.$tpl.'.php'."]");
                }
                else
                {
                    $this_class=get_class($this);
                    $object = new $this_class($class);
                    return $object->_exist($tpl);
                }
            }
    }

    /* Вывод tpl-файла, в который подставляются все данные для вывода */
    public function render($template , $args = []) {
        $template = $this->_exist($template);
        ob_start();
        extract($args);
        include ($template);
        return ob_get_clean();
    }
}