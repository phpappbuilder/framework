<?php
/**
 * Created by PhpStorm.
 * User: slavik
 * Date: 14.12.18
 * Time: 18:17
 */

namespace Centurion\Router;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Url
{
    static function url(string $route_name , array $args = [] , $absolute = false){
        $collection = new RouteCollection();
        $space = space()->Collection('app/router/collection');
        if($space!=NULL && count($space)>0)
        {
            foreach($space as $key => $value)
            {
                $value = require($value);
                $router = $value->run();
                $collection->addCollection($router);
            }
        }
        $context = new RequestContext('');
        $generator = new Routing\Generator\UrlGenerator($collection, $context);
        if (!$absolute){return $generator->generate($route_name, $args);}
        else {return $generator->generate($route_name, $args , UrlGeneratorInterface::ABSOLUTE_URL);}
    }
}