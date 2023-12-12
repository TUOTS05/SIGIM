<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

  // la page d'accueil du site sigim----------------------

$routes->get('/', 'Home::index');

  // les routes du dashboard patient----------------------

$routes->get('/Accueil', 'Patient::index');
$routes->get('/Patient/login', 'Patient::index');
$routes->get('/Patient/register', 'Patient::register');
$routes->post('/Patient/save_patient', 'Patient::savePatient');
$routes->post('/Patient/login', 'Patient::login');
$routes->get('/Patient/logout', 'Patient::logout');
$routes->get('/Patient/page-profile', 'Patient::profile');
$routes->get('/Patient/dash', 'Patient::dash');


// les routes pour le professionnel de sante

$routes->get('/Prosante', 'Prosante::index');
// connexion du dashboard du professionnel de sante
$routes->get('/Prosante/login', 'Prosante::login');
$routes->post('/Prosante/login', 'Prosante::login');

// inscription du dashboard du professionnel de sante
$routes->get('/Prosante/register', 'Prosante::register');
$routes->post('/Prosante/register', 'Prosante::register');


$routes->get('/Prosante/register-prosante/(:num)', 'Prosante::register_prosante/$1');

$routes->get('/Prosante/logout', 'Prosante::logout');



# Routes pour les Admins------------------------------------------------

$routes->get('/login', 'User::index');
$routes->get('/Admin', 'AdminController::index');
$routes->get('/Admin/register', 'User::register');
$routes->post('/Admin/storeUser', 'User::storeUser');
$routes->post('/Admin/login', 'User::login');
