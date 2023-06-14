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
$routes->get('/', 'Dashboard::index');

/** ROUTE SUPPLIER */
$routes->get('/supplier', 'Supplier::index');
$routes->get('/supplier/tambah', 'Supplier::create');
$routes->post('/supplier/tambah', 'Supplier::store');
$routes->get('/supplier/edit/(:num)', 'Supplier::edit/$1');
$routes->post('/supplier/edit/(:num)', 'Supplier::update/$1');
$routes->post('/supplier/hapus/(:num)', 'Supplier::delete/$1');

/** ROUTE BARANG */
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/tambah', 'Barang::create');
$routes->post('/barang/tambah', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/edit/(:num)', 'Barang::update/$1');
$routes->post('/barang/hapus/(:num)', 'Barang::delete/$1');

/** ROUTE TRANSAKSI */
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/tambah', 'Transaksi::create');
$routes->post('/transaksi/tambah', 'Transaksi::store');
$routes->get('/transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('/transaksi/edit/(:num)', 'Transaksi::update/$1');
$routes->post('/transaksi/hapus/(:num)', 'Transaksi::delete/$1');

/** ROUTE LAPORAN TRANSAKSI */
$routes->get('/laporan-transaksi', 'LaporanTransaksi::index');

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
