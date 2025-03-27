<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

service('auth')->routes($routes);

$routes->group('api', static function (RouteCollection $routes) {
    $routes->group('v1', static function (RouteCollection $routes) {
        $routes->group('auth', ['namespace' => '\App\Controllers\V1\Auth'], static function (RouteCollection $routes) {
            $routes->group('login', static function (RouteCollection $routes) {
                $routes->post('/', 'LoginController::emailPasswordLogin');
                $routes->post('google', 'LoginController::googleLogin');
                $routes->post('facebook', 'LoginController::facebookLogin');
            });

            $routes->post('signup', 'SignupController::signup');
        });
    });

    $routes->options('(:any)', static function () {});
});
