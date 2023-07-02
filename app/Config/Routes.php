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
$routes->group('admin', ['filter' => 'admin:dual,noreturn'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index', ['as' => 'admin.dashboard']);

    // add groub member
    $routes->group('member', function ($routes) {
        $routes->get('/', 'MemberController::index', ['as' => 'member']);
        $routes->post('add', 'MemberController::add', ['as' => 'member.add']);
        $routes->post('update', 'MemberController::update', ['as' => 'member.update']);
        $routes->post('delete', 'MemberController::delete', ['as' => 'member.delete']);
    });

    // add group book
    $routes->group('book', function ($routes) {
        $routes->get('/', 'BookController::index', ['as' => 'book']);
        $routes->post('add', 'BookController::add', ['as' => 'book.add']);
        $routes->post('update', 'BookController::update', ['as' => 'book.update']);
        $routes->post('delete', 'BookController::delete', ['as' => 'book.delete']);
    });

    // add group loan
    $routes->group('loan', function ($routes) {
        $routes->get('/', 'LoanController::index', ['as' => 'loan']);
        $routes->post('add', 'LoanController::add', ['as' => 'loan.add']);
        $routes->post('delete', 'LoanController::delete', ['as' => 'loan.delete']);
    });

    // add group return
    $routes->group('return', function ($routes) {
        $routes->get('/', 'ReturnController::index', ['as' => 'return']);
        $routes->post('update', 'ReturnController::update', ['as' => 'return.update']);
        $routes->post('delete', 'ReturnController::delete', ['as' => 'return.delete']);
    });

    // add group report
    $routes->group('report', function ($routes) {
        $routes->get('/', 'ReportController::index', ['as' => 'report']);
        $routes->post('/', 'ReportController::index', ['as' => 'postReport']);
    });
});

// make group student
$routes->group('student', ['filter' => 'student:dual,noreturn'], function ($routes) {
    $routes->get('dashboard', 'StudentController::index', ['as' => 'student.dashboard']);

    // add group book
    $routes->group('book', function ($routes) {
        $routes->get('/', 'BookController::index', ['as' => 'student.book']);
    });

    // add group loan
    $routes->group('loan', function ($routes) {
        $routes->get('/', 'LoanController::index', ['as' => 'student.loan']);
    });

    // add group return
    $routes->group('return', function ($routes) {
        $routes->get('/', 'ReturnController::index', ['as' => 'student.return']);
    });
});

// make group headmaster with filter auth
$routes->group('headmaster', ['filter' => 'headmaster:dual,noreturn'], function ($routes) {
    $routes->get('dashboard', 'HeadmasterController::index', ['as' => 'headmaster.dashboard']);
    // make group loan
    $routes->group('loan', function ($routes) {
        $routes->get('/', 'LoanController::index', ['as' => 'headmaster.loan']);
    });
    
});

$routes->group('auth', function ($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'auth.login', 'filter' => 'noauth']);
    $routes->post('login', 'AuthController::postLogin', ['as' => 'auth.postLogin', 'filter' => 'noauth']);
    $routes->get('logout', 'AuthController::logout', ['as' => 'auth.logout']);
    $routes->post('change-password', 'AuthController::changePassword', ['as' => 'auth.changePassword']);
    $routes->get('profile', 'AuthController::profile', ['as' => 'auth.profile']);
});

// API Routes
$routes->group('api', function ($routes) {
    $routes->get('student/(:num)', 'ApiController::getStudentById/$1', ['as' => 'api.student.getStudentById']);
    $routes->get('book/(:num)', 'ApiController::getBookById/$1', ['as' => 'api.book.getBookById']);
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
