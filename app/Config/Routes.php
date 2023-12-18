<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */





  // la page d'accueil du site sigim----------------------

$routes->get('/', 'Home::index');
$routes->get('/contact','Home::contact');
$routes->get('/apropo','Home::apropo');

$routes->get('/Patient', 'Patient::login');
$routes->get('/Patient/register', 'Patient::register');
$routes->post('/Patient/save_patient', 'Patient::savePatient');
$routes->post('/Patient/login_patient', 'Patient::loginPatient');
$routes->get('Patient/activate/(:any)', 'Patient::activate/$1');

$routes->get('/Patient/dash', 'Patient::dash');
$routes->get('/Patient/page-profile', 'Patient::profile');
$routes->get('/Patient/logout', 'Patient::logout');


// les routes pour le professionnel de sante

$routes->get('/Prosante', 'Prosante::index');
// connexion du dashboard du professionnel de sante
$routes->get('/Prosante/login', 'Prosante::login');
$routes->post('/Prosante/login', 'Prosante::login');


// inscription du dashboard du professionnel de sante
$routes->get('/Prosante/register', 'Prosante::register');
$routes->post('/Prosante/register', 'Prosante::register');


$routes->get('/Prosante/register-prosante/(:num)', 'Prosante::register_prosante/$1');
$routes->post('/Prosante/register-prosante/(:num)', 'Prosante::register_prosante/$1');

$routes->get('/Prosante/logout', 'Prosante::logout');



# Routes pour les Hopitaux------------------------------------------------

$routes->get('/Hopital', 'Hopital::login');
$routes->get('/Hopital/register', 'Hopital::register');
$routes->post('/Hopital/save_hopital', 'Hopital::saveHopital');
$routes->post('/Hopital/login_hopital', 'Hopital::loginHopital');
$routes->get('Hopital/activate/(:any)', 'Hopital::activate/$1');

$routes->get('/Hopital/dash', 'Hopital::dash');
$routes->get('/Hopital/page-profile', 'Hopital::profile');
$routes->get('/Hopital/logout', 'Hopital::logout');



# Routes pour les Fablab------------------------------------------------

$routes->get('/Fablab', 'Fablab::login');
$routes->get('/Fablab/register', 'Fablab::register');
$routes->post('/Fablab/save_fablab', 'Fablab::saveFablab');
$routes->post('/Fablab/login_fablab', 'Fablab::loginFablab');
$routes->get('/Fablab/activate/(:any)', 'Fablab::activate/$1');


$routes->get('/Fablab/dash', 'Fablab::dash');
$routes->get('/Fablab/page-profile', 'Fablab::profile');
$routes->get('/Fablab/logout', 'Fablab::logout');
