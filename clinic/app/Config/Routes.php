<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/clinicmg', 'ClinicController::index');

$routes->get('/clinicmg/staff', 'ClinicController::staff');
$routes->post('/clinicmg/changesched', 'ClinicController::changesched');
$routes->post('/clinicmg/registerstaff', 'ClinicController::registerstaff');
$routes->match(['get', 'post'], '/check', 'Home::check');
$routes->match(['get', 'post'], '/schedule', 'Home::schedule');
$routes->match(['get', 'post'], '/appointment', 'Home::appointment');
$routes->match(['get', 'post'], '/request/medicine', 'Home::rmedicine');
$routes->match(['get', 'post'], '/appointment/(:any)', 'Home::appointments/$1');
$routes->match(['get', 'post'], '/book', 'Home::book');
$routes->match(['get', 'post'], '/auth', 'MainController::auth');
$routes->match(['get', 'post'], '/validates', 'MainController::validates');
$routes->match(['get', 'post'], '/doctors', 'Home::doctors');
$routes->match(['get', 'post'], '/nurses', 'Home::nurses');
$routes->match(['get', 'post'], '/services', 'Home::services');
$routes->match(['get', 'post'], '/services/view/(:any)', 'Home::views/$1');


$routes->get('/login', 'MainController::login');
$routes->get('/logout', 'MainController::logout');
$routes->match(['get', 'post'], '/register', 'MainController::register');
$routes->match(['get', 'post'], '/verify/(:any)', 'MainController::verify/$1');
$routes->match(['get', 'post'], '/reset', 'MainController::reset');
$routes->match(['get', 'post'], '/reset/(:any)', 'MainController::passreset/$1');
$routes->match(['get', 'post'], '/changepassword', 'MainController::changepassword');
$routes->match(['get', 'post'], '/requestmed', 'MainController::requestmed');
$routes->match(['get', 'post'], '/hrequest', 'MainController::hrequest');
$routes->match(['get', 'post'], '/bookhistory', 'MainController::bookhistory');

$routes->post('/clinicmg/addstock', 'ClinicController::addstock');
$routes->get('/clinicmg/history/(:any)', 'ClinicController::history/$1');
$routes->post('/clinicmg/updatemed', 'ClinicController::updatemed');
$routes->get('/clinicmg/nschedule', 'ClinicController::nschedule');
$routes->get('/clinicmg/today', 'ClinicController::today');
$routes->get('/clinicmg/incoming', 'ClinicController::incoming');
$routes->get('/clinicmg/client', 'ClinicController::client');
$routes->get('/clinicmg/viewrecords/(:any)', 'ClinicController::viewrecords/$1');
$routes->get('/clinicmg/approve/(:any)', 'ClinicController::approve/$1');
$routes->get('/clinicmg/fbchat', 'ClinicController::fbchat');
$routes->match(['get', 'post'],'/clinicmg/approvemed', 'ClinicController::approvemed');
$routes->match(['get', 'post'],'/clinicmg/rejectmed/(:any)', 'ClinicController::rejectmed/$1');

// medicine
$routes->get('/clinicmg/newrequest', 'ClinicController::newrequest');
$routes->get('/clinicmg/medicinelist', 'ClinicController::medicinelist');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
