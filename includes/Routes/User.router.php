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

class UserRouter {
    
    function __construct($app) {
        $this->app = $app;
        $this->router($app);
    }

    function router($app) {
		$app->group('', function (RouteCollectorProxy $group) {
            $group->get('/user/{user}', function (Request $request, Response $response, $args) {
                $user = $args['user'];
                $test = $this->getUser($user);

                $data = array('user' => $user, 'str' => $test);
                $payload = json_encode($data);

                $response->getBody()->write($payload);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
            })->setName('user');
			$group->get('/users', function(Request $request, Response $response, $args) {

                $users = array();
                for($i=0;$i<200; $i++) {
                    array_push($users, (object) [
                        "id" => $i+1,
                        "name" => uniqid(),
                        "email" => uniqid().'@demo.com'
                    ]);
                }

                $data = (object) [
                    "data" => $users,
                ];
                $payload = json_encode($data);

                $response->getBody()->write($payload);
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            })->setName('users');
		});        
    }

    function getUser($user) {
        return sprintf("User is %s", $user);
    }
}
