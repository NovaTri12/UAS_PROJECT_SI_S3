<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// AUTH
$routes->group('admin', ['namespace' => 'App\Controllers\Auth\Admin'], ['filter' => 'authfilter'], function ($routes) {
    // GET ROUTE AUTH ADMIN
    $routes->get('login', 'LoginUser::index');
    $routes->get('logout', 'AuthUser::logout');

    // POST ROUTE AUTH ADMIN
    $routes->post('valid_login', 'AuthUser::valid_login');
});

$routes->group('customer', ['namespace' => 'App\Controllers\Auth\Customer'], ['filter' => 'authfilter'], function ($routes) {
    // GET ROUTE AUTH ADMIN
    $routes->get('login', 'LoginCustomer::index');
    $routes->get('logout', 'AuthCustomer::logout');

    // POST ROUTE AUTH ADMIN
    $routes->post('valid_login', 'AuthCustomer::valid_login');
});


// MANAGE DATA
$routes->group('manage-admin', ['namespace' => 'App\Controllers\Admin'], ['filter' => 'authfilter'], function ($routes) {
    //GET SECTION
    $routes->get('customer', 'Customer::index');
    $routes->get('order', 'Order::index');
    $routes->get('kategori-project', 'KategoriProject::index');
    $routes->get('project', 'Project::index');
    $routes->get('membership', 'Membership::index');
    $routes->get('user', 'User::index');

    // ADD / EDIT SECTION
    $routes->add('customer/new', 'Customer::create');
    $routes->add('customer/(:segment)/edit', 'Customer::edit/$1');
    $routes->add('order/(:segment)/edit', 'Order::edit/$1');


    //DELETE SECTION
    $routes->get('customer/(:segment)/delete', 'Customer::delete/$1');

});

// MANAGE DATA
$routes->group('manage-customer', ['namespace' => 'App\Controllers\Customer'], ['filter' => 'authfilter'], function ($routes) {
    //GET SECTION
    $routes->get('order-customer', 'OrderCustomer::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
