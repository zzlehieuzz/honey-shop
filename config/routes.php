<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/admin', ['plugin' => 'Admin', 'controller' => 'Page', 'action' => 'index']);
    $routes->fallbacks('DashedRoute');
});

Router::plugin('Admin', function (RouteBuilder $routes) {
    $routes->fallbacks('InflectedRoute');
});

//
//Router::plugin('Admin', function ($routes) {
//
//    Router::connect("admin/", [
//        'controller' => 'Page',
//        'action' => 'index'
//    ]);
//    $routes->fallbacks('InflectedRoute');
//});

Plugin::routes();
