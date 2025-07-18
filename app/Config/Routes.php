<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');


$routes->get('lowongan', 'LowonganController::index');
$routes->get('schedules', 'ClassSchedulesController::dashboard');

// Admin routes
$routes->get('login', 'AuthController::index');
$routes->post('login/action', 'AuthController::doLogin');
$routes->get('logout', 'AuthController::logout');

$routes->group(
    '',
    ['filter' => 'auth'],
    function ($routes) {
        // Lowongan routes
        $routes->get('admin', 'AdminController::dashboard');
        $routes->get('lowongan-admin', 'AdminController::lowongan');
        $routes->get('lowongan/tambah', 'LowonganController::create');
        $routes->post('lowongan/store', 'LowonganController::store');
        $routes->post('lowongan/update/(:num)', 'LowonganController::update/$1');
        $routes->post('lowongan/delete/(:num)', 'LowonganController::delete/$1');

        // Roles routes
        $routes->get('roles', 'RolesController::index');
        $routes->get('roles/tambah', 'RolesController::create');
        $routes->post('roles/store', 'RolesController::store');
        $routes->post('roles/update/(:num)', 'RolesController::update/$1');
        $routes->post('roles/delete/(:num)', 'RolesController::delete/$1');

        // Users routes
        $routes->get('users', 'UsersController::index');
        $routes->get('users/tambah', 'UsersController::create');
        $routes->post('users/store', 'UsersController::store');
        $routes->post('users/update/(:num)', 'UsersController::update/$1');
        $routes->post('users/delete/(:num)', 'UsersController::delete/$1');

        // Majors routes
        $routes->get('majors', 'MajorsController::index');
        $routes->get('majors/tambah', 'MajorsController::create');
        $routes->post('majors/store', 'MajorsController::store');
        $routes->post('majors/update/(:num)', 'MajorsController::update/$1');
        $routes->post('majors/delete/(:num)', 'MajorsController::destroy/$1');

        // Schedules routes
        $routes->get('schedules-admin', 'ClassSchedulesController::index');
        $routes->get('schedules/tambah', 'ClassSchedulesController::create');
        $routes->post('schedules/store', 'ClassSchedulesController::store');
        $routes->post('schedules/update/(:num)', 'ClassSchedulesController::update/$1');
        $routes->post('schedules/delete/(:num)', 'ClassSchedulesController::destroy/$1');
    }
);
