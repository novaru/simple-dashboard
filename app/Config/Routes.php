<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/* Protected routes */
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->group('admin', ['filter' => 'admin'], function ($routes) {
        $routes->get('dashboard',   'Admin::index');
        $routes->get('update/(:any)', 'Admin::update/$1');
        $routes->post('update/(:any)', 'Admin::updateUser/$1');
        $routes->post('delete/(:any)', 'Admin::delete/$1');
    });
});

$routes->group('auth', function ($routes) {
    $routes->get('login',      'Auth::login');
    $routes->post('login',     'Auth::doLogin');
    $routes->get('register',   'Auth::register');
    $routes->post('register',  'Auth::doRegister');
    $routes->get('logout',     'Auth::logout');
});
