<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// make groub admin
$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('login', 'AdminController::login');
    $routes->get('logout', 'AdminController::logout');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('profile', 'AdminController::profile');
    $routes->get('setting', 'AdminController::setting');
});

$routes->group('auth', function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('register', 'AuthController::register');
    $routes->get('forgot', 'AuthController::forgot');
    $routes->get('reset', 'AuthController::reset');
    $routes->get('activate-account', 'AuthController::activateAccount');
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount');
    $routes->get('deactivate-account', 'AuthController::deactivateAccount');
    $routes->get('change-password', 'AuthController::changePassword');
    $routes->get('change-email', 'AuthController::changeEmail');
    $routes->get('profile', 'AuthController::profile');
    $routes->get('setting', 'AuthController::setting');
});

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
