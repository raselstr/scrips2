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

$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
if ($forge->createDatabase('dbscripsi2')) 
    {
        echo 'Database created!';
    }
});


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('login','Auth::index');

$routes->get('perjadin-home', 'Perjadin::index');
// $routes->addRedirect('/', 'home');

$routes->get('opds/trash','Opds::trash');
$routes->get('opds/restore/(:any)','Opds::restore/$1');
$routes->get('opds/restore','Opds::restore');
$routes->delete('opds/delete2/(:segment)','Opds::delete2/$1');
$routes->delete('opds/delete2','Opds::delete2');
$routes->get('opds/export', 'Opds::export');

$routes->presenter('opds');

$routes->get('pegawais/trash','Pegawais::trash');
$routes->get('pegawais/restore/(:any)','pegawais::restore/$1');
$routes->get('pegawais/restore','pegawais::restore');
$routes->delete('pegawais/delete2/(:segment)','pegawais::delete2/$1');
$routes->delete('pegawais/delete2','pegawais::delete2');

$routes->resource('pegawais');

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
