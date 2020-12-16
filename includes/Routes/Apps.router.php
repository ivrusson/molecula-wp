<?php
/**
* molecula-wp
*
*
* @package   molecula-wp
* @author    Ivrusson
* @license   GPL-3.0
* @link      https://github.com/ivrusson
*/

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

class AppsRouter {
    
    function __construct($app) {
        $this->app = $app;
        $this->router($app);
    }

    function router($app) {
		$app->group('', function (RouteCollectorProxy $group) {
			$group->get('/apps', function(Request $request, Response $response, $args) {

                $data = [
                    (object)[
                        "name" => "app1",
                        "entry" => "/moapp/app1",
                        "to" => "/app1",
                        "props" => (object)[
                            "testProp1" => "test1"
                        ]
                    ],
                (object)[
                        "name" => "app2",
                        "entry" => "/moapp/app2",
                        "to" => "/app2",
                        "props" => (object)[
                            "testProp2" => "test2"
                        ]
                    ],
                (object)[
                        "name" => "app3",
                        "entry" => "/moapp/app3",
                        "to" => "/app3"
                    ],
                ];            
                $payload = json_encode($data);

                $response->getBody()->write($payload);
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            })->setName('user');
		});        
    }
}