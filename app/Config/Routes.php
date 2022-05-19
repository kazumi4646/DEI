<?php

namespace Config;

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

// Auth mitra
$routes->get('/register/mitra', 'Mitra::index');
$routes->post('/mitra', 'Mitra::register');

// Home routes
$routes->get('/', 'Home::index');
$routes->get('/activity', 'Home::activity');
$routes->get('/release', 'Home::release');
$routes->get('/history', 'Home::history');
$routes->get('/terms', 'Home::terms');
$routes->get('/policy', 'Home::policy');
$routes->get('/vision', 'Home::vision');

// Shopping routes
$routes->get('/shop', 'Shop::index');
$routes->get('/(:num)/detail', 'Shop::detail/$1');
$routes->get('/(:num)/bid', 'Shop::bid/$1');

// Blog routes
$routes->get('/blog', 'Blog::index');

// Role routes
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:admin,mitra,user']);
$routes->resource('products', ['filter' => 'role:admin,mitra']);
$routes->get('/requests', 'Dashboard::requests', ['filter' => 'role:admin,mitra']);
$routes->get('/profile', 'Dashboard::profile', ['filter' => 'role:mitra,user']);
$routes->post('/profile/(.*)/update', 'Dashboard::update_profile/$1', ['filter' => 'role:mitra,user']);
// $routes->get('/orders', 'Dashboard::orders', ['filter' => 'role:admin,user']);
$routes->resource('orders', ['controller' => '\App\Controllers\Order', 'filter' => 'role:admin,user']);

// Admin routes
$routes->get('/dashboard/shop', 'Admin::shop', ['filter' => 'role:admin']);
$routes->post('/shop/(.*)/show', 'Admin::show/$1', ['filter' => 'role:admin']);
$routes->post('/shop/(.*)/remove', 'Admin::remove/$1', ['filter' => 'role:admin']);
$routes->post('/shop/(.*)/delete', 'Admin::delete/$1', ['filter' => 'role:admin']);
$routes->get('/mitra', 'Admin::mitra', ['filter' => 'role:admin']);
$routes->post('/mitra/(.*)/lunas', 'Admin::pembayaran_koperasi/$1', ['filter' => 'role:admin']);
$routes->get('/accounts', 'Admin::accounts', ['filter' => 'role:admin']);
$routes->post('/accounts/(.*)/status', 'Admin::account_status/$1', ['filter' => 'role:admin']);
$routes->post('/accounts/(.*)/delete', 'Admin::delete_account/$1', ['filter' => 'role:admin']);
$routes->post('/requests/(.*)/approve', 'Admin::approve_request/$1', ['filter' => 'role:admin']);
$routes->post('/requests/reject', 'Admin::reject_request', ['filter' => 'role:admin']);
$routes->get('/order/history', 'Order::history', ['filter' => 'role:admin']);

// Mitra Routes
$routes->get('/payment', 'Mitra::payment', ['filter' => 'role:mitra']);
$routes->post('/requests/(.*)/request', 'Mitra::request_product/$1', ['filter' => 'role:mitra']);
$routes->post('/requests/(.*)/cancel', 'Mitra::cancel_request/$1', ['filter' => 'role:mitra']);

// User Routes
$routes->resource('cart', ['filter' => 'role:user']);
$routes->post('/cart/min', 'Cart::min_product', ['filter' => 'role:user']);

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
