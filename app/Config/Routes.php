<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');


$routes->get('lowongan', 'LowonganController::index');
$routes->get('schedules', 'ClassSchedulesController::dashboard');
$routes->get('pelatihan-regular', 'Dashboard::pelatihanReg');
$routes->get('pelatihan-mtu', 'Dashboard::pelatihanMTU');

// Admin routes
$routes->get('login', 'AuthController::index');
$routes->post('login/action', 'AuthController::doLogin');
$routes->get('logout', 'AuthController::logout');

// Registration routes
$routes->post('registrasi/storeReg', 'RegistrationController::storeReg');
$routes->post('registrasi/storeMTU', 'RegistrationController::storeMTU');
$routes->get('registration/regis-reg', 'RegistrationController::regisReg');
$routes->get('registration/regis-mtu', 'RegistrationController::regisMTU');

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

        // Registrations routes
        $routes->get('registration/data-reg', 'RegistrationController::dataReg');
        $routes->get('registration/data-mtu', 'RegistrationController::dataMTU');
        $routes->post('registration/data-reg/delete/(:num)', 'RegistrationController::deleteReg/$1');
        $routes->post('registration/data-mtu/delete/(:num)', 'RegistrationController::deleteMTU/$1');
        $routes->get('registration/download-zip/(:segment)', 'RegistrationController::download_zip/$1');
        $routes->get('registration/download-zip-mtu/(:segment)', 'RegistrationController::download_zip_mtu/$1');

    }
);
