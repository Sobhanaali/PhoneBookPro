<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/login' , 'AuthController::login');
$routes->get('/register' , 'AuthController::register');
$routes->get('/logout' , 'AuthController::logout');

$routes->post('/register' , 'AuthController::registerPost');
$routes->post('/login' , 'AuthController::loginPost');

$routes->get('/dashboard' , 'DashboardController::index');

$routes->post('/contact/store' , 'ContactController::store');
$routes->post('/contact/update' , 'ContactController::update');
$routes->post('/contact/delete' , 'ContactController::delete');
