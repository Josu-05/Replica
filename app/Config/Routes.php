<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ComisionController::index');
$routes->post('/calcular', 'ComisionController::calcular');
