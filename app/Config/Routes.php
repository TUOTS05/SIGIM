<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/Patient', 'Patient::login');
$routes->get('/Patient/register', 'Patient::register');
$routes->post('/Patient/save_patient', 'Patient::savePatient');
$routes->post('/Patient/login_patient', 'Patient::loginPatient');
$routes->get('Patient/activate/(:any)', 'Patient::activate/$1');

$routes->get('/Patient/dash', 'Patient::dash');
$routes->get('/Patient/page-profile', 'Patient::profile');
$routes->get('/Patient/logout', 'Patient::logout');


# Routes pour les Admins------------------------------------------------

// $routes->get('/login', 'User::index');
// $routes->get('/Admin', 'AdminController::index');
// $routes->get('/Admin/register', 'User::register');
// $routes->post('/Admin/storeUser', 'User::storeUser');
// $routes->post('/Admin/login', 'User::login');
