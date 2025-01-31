<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/login' , 'AuthController::login');
$routes->get('/register' , 'AuthController::register');

$routes->post('/register' , 'AuthController::registerPost');
$routes->post('/login' , 'AuthController::loginPost');

$routes->get('/dashboard' , 'DashboardController::index');
