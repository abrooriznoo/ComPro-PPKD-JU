<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');

$routes->get('admin', 'AdminController::dashboard');

// Lowongan routes
$routes->get('lowongan', 'LowonganController::index');
$routes->get('lowongan-admin', 'AdminController::lowongan');
$routes->get('lowongan/tambah', 'LowonganController::create');
$routes->post('lowongan/store', 'LowonganController::store');
$routes->post('lowongan/update/(:num)', 'LowonganController::update/$1');
$routes->post('lowongan/delete/(:num)', 'LowonganController::delete/$1');


