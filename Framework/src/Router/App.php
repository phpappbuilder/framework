<?php
namespace Centurion\Router;

use Symfony\Component\Routing;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Centurion\Http\Request;
use Centurion\Http\Response;

class App
{
    private $collection;

    public function __construct() {
        $this->collection = new RouteCollection();
        $space = space()->Collection('app/router/collection');
        bdump($space);
        if($space!=NULL && count($space)>0)
        {
            foreach($space as $key => $value)
            {
                $value = require($value);
                $router = $value->run();
                $this->collection->addCollection($router);
            }
        }
    }

    private function mdl(string $string){
        $result = [];
        $data = explode(':', $string);

        $result['middleware']=$data[0];
        $result['args']=[];
        $count = count($result);
        for ($i=1;$i<$count;$i++){
            $result['args'][]=$data[$i];
        }
        return $result;
    }

    public function run() {
        $request = Request::createFromGlobals();
        $context = new RequestContext();
        $context->fromRequest($request);
        $matcher = new UrlMatcher($this->collection, $context);


        $response = new Response();
        try {
            $info = $matcher->match($request->getPathInfo());
            foreach ($info['_middleware'] as $value){
                $mdl = $this->mdl($value);
                $name = $mdl['middleware'];
                $args = $mdl['args'];
                $middleware = new $name($request, $response, $args);
                $middleware->startBefore();
                $request = $middleware->request;
                $response = $middleware->response;
                unset($middleware);
            }

            $controller = '\\App\\Controller\\'.$info['_controller'];
            $action = $info['_action'];
            bdump($info);

            $get = new $controller($request, $response, $info);
            $get = $get->$action();

            if (get_class($get) == Response::class){
                $response = $get;
                foreach ($info['_middleware'] as $value){
                    $mdl = $this->mdl($value);
                    $name = $mdl['middleware'];
                    $args = $mdl['args'];
                    $middleware = new $name($request, $response, $args);
                    $middleware->startAfter();
                    $request = $middleware->request;
                    $response = $middleware->response;
                    unset($middleware);
                }
                $get -> send();
            }

        } catch (Routing\Exception\ResourceNotFoundException $exception) {
            $response = space()->Key('phpappbuilder/router/err404');
            $response -> send();
        }
    }
}