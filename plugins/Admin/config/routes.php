<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Admin',
    ['path' => 'admin'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);

Router::prefix('admin', function (RouteBuilder $routes) {
    $routes->plugin('Admin', function (RouteBuilder $routes) {
        $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
        $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
    });
});
