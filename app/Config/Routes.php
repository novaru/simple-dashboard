<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('login',      'Auth::login');
    $routes->post('login',     'Auth::doLogin');
    $routes->get('register',   'Auth::register');
    $routes->post('register',  'Auth::doRegister');
    $routes->get('logout',     'Auth::logout');
});

/* Protected routes */
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->group('admin', function ($routes) {
        $routes->get('dashboard', 'Admin::index');
    });
});
