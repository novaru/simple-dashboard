<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::doLogin');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::doRegister');
