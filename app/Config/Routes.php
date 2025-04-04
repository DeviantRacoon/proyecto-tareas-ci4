<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TaskController::index');
$routes->get('/task', 'TaskController::index');
$routes->get('/task/create', 'TaskController::create');
$routes->get('task/edit/(:num)', 'TaskController::edit/$1');

$routes->post('/task/save', 'TaskRestController::saveTask');
$routes->put('/task/update/(:num)', 'TaskRestController::updateTask/$1');
$routes->delete('/task/delete/(:num)', 'TaskRestController::deleteTask/$1');
