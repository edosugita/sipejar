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
$routes->group('', ['filter' => 'UserFilter'], function ($routes) {
    //     $routes->group('', ['filter' => 'Role2Filter'], function ($routes) {
    $routes->get('/dashboard', 'Users::index');
    $routes->get('/pelajaran/(:segment)', 'Users::matkul/$1');
    $routes->match(['get', 'post'], '/pelajaran/(:num)/presensi/(:segment)', 'Users::presensi/$1');
    $routes->match(['get', 'post'], '/pelajaran/tugas/(:num)/(:segment)', 'Users::tugas/$1');
    $routes->match(['get', 'post'], '/pelajaran/tugas/(:num)/(:segment)/add', 'Users::pengumpulan/$1');
    $routes->match(['get', 'post'], '/pelajaran/tugas/(:num)/(:segment)/remove', 'Users::remove/$1');
    $routes->match(['get', 'post'], '/pelajaran/tugas/(:num)/(:segment)/edit', 'Users::edit/$1');
    $routes->get('/pengumpulan', 'Users::pengumpulan');

    $routes->match(['get', 'post'], '/user/logout', 'Auth::logout');
    $routes->match(['get', 'post'], '/perpustakaan', 'Perpus::index');
    //     });
});

$routes->match(['get', 'post'], '/login', 'Auth::index');
$routes->get('/register', 'Auth::register');

// TEACHER

$routes->match(['get', 'post'], '/teacher/login', 'TeachersAuth::index');

$routes->group('', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->match(['get', 'post'], '/logout', 'TeachersAuth::logout');

    // LOGOUT

    $routes->group('teacher', ['filter' => 'RoleFilter'], function ($routes) {
        $routes->get('/', 'Teachers::index');
        $routes->match(['get', 'post'], 'add/matkul', 'Teachers::add');
        $routes->get('matakuliah/(:segment)', 'Teachers::MatkulInfo/$1');

        $routes->match(['get', 'post'], 'matakuliah/(:segment)/add', 'Teachers::AddTugas/$1');

        $routes->match(['get', 'post'], 'matakuliah/(:num)/presensi/(:segment)', 'Presensi::index/$1');

        $routes->get('matakuliah/tugas/(:segment)', 'TugasSiswa::index/$1');

        $routes->match(['get', 'post'], 'matakuliah/(:num)/edit/tugas/(:segment)', 'TugasSiswa::edit/$1');

        // SETTING
        $routes->match(['get', 'post'], 'setting', 'Setting::index');
    });
});


$routes->get('/', 'AdminDashboard::index', ['filter' => 'UrlFilter']);

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
