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
$routes->get('/', 'Users::index');
$routes->get('/matakuliah/(:segment)', 'Users::matkul/$1');
$routes->get('/presensi', 'Users::presensi');
$routes->get('/tugas', 'Users::tugas');
$routes->get('/pengumpulan', 'Users::pengumpulan');

$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');

// TEACHER

$routes->match(['get', 'post'], '/teacher/login', 'TeachersAuth::index', ['filter' => 'NoAuthFilter']);

$routes->group('', ['filter' => 'AuthFilter'], function ($routes) {

    // LOGOUT
    $routes->match(['get', 'post'], '/logout', 'TeachersAuth::logout');

    $routes->group('teacher', function ($routes) {
        $routes->get('/', 'Teachers::index');
        $routes->match(['get', 'post'], 'add/matkul', 'Teachers::add');
        $routes->get('matakuliah/(:segment)', 'Teachers::MatkulInfo/$1');

        $routes->match(['get', 'post'], 'matakuliah/(:segment)/add', 'Teachers::AddTugas/$1');

        $routes->match(['get', 'post'], 'matakuliah/(:segment)/presensi/(:num)', 'Presensi::index/$1');

        $routes->get('matakuliah/tugas/(:segment)', 'TugasSiswa::index/$1');

        // SETTING
        $routes->match(['get', 'post'], 'setting', 'Setting::index');
    });
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
