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

    $routes->match(['get', 'post'], '/pelajaran/diskusi/(:num)', 'Diskusi::users/$1');
    $routes->match(['get', 'post'], '/diskusi/view/(:num)', 'Comment::users/$1');

    $routes->get('/pengumpulan', 'Users::pengumpulan');

    $routes->match(['get', 'post'], '/user/logout', 'Auth::logout');
    $routes->match(['get', 'post'], '/perpustakaan', 'Perpus::index');
    $routes->match(['get', 'post'], '/setting', 'Setting::user');
    $routes->match(['get', 'post'], '/help', 'Help::index');
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

        $routes->match(['get', 'post'], 'matakuliah/diskusi/(:num)', 'Diskusi::index/$1');
        $routes->match(['get', 'post'], 'matakuliah/diskusi/(:num)/add', 'Diskusi::add/$1');
        $routes->match(['get', 'post'], '/diskusi/view/(:num)', 'Comment::index/$1');

        $routes->match(['get', 'post'], 'perpus', 'Perpus::teacher');
        $routes->match(['get', 'post'], 'perpus/add', 'Perpus::add');
        // SETTING
        $routes->match(['get', 'post'], 'setting', 'Setting::index');

        $routes->match(['get', 'post'], 'help', 'Help::teacher');
    });
});

$routes->match(['get', 'post'], '/admin/login', 'AdminAuth::index', ['filter' => 'NoAd']);

$routes->group('admin', ['filter' => 'AdFil'], function ($routes) {
    // LOGOUT
    $routes->get('logout', 'AdminAuth::logout');

    $routes->get('dashboard', 'Admin::index');

    $routes->group('master', function ($routes) {
        $routes->get('/', 'MasterAdmin::index');
        $routes->get('(:num)/view', 'MasterAdmin::view/$1');
        $routes->match(['get', 'post'], '(:num)/edit', 'MasterAdmin::edit/$1');
        $routes->match(['get', 'post'], 'delete', 'MasterAdmin::delete');
        $routes->match(['get', 'post'], 'add', 'MasterAdmin::add');
    });

    $routes->group('siswa', function ($routes) {
        $routes->get('/', 'MasterSiswa::index');
        $routes->get('(:num)/view', 'MasterSiswa::view/$1');
        $routes->match(['get', 'post'], '(:num)/edit', 'MasterSiswa::edit/$1');
        $routes->match(['get', 'post'], 'delete', 'MasterSiswa::delete');
        $routes->match(['get', 'post'], 'add', 'MasterSiswa::add');
    });

    $routes->group('guru', function ($routes) {
        $routes->get('/', 'MasterGuru::index');
        $routes->get('(:num)/view', 'MasterGuru::view/$1');
        $routes->match(['get', 'post'], '(:num)/edit', 'MasterGuru::edit/$1');
        $routes->match(['get', 'post'], 'delete', 'MasterGuru::delete');
        $routes->match(['get', 'post'], 'add', 'MasterGuru::add');
    });

    $routes->group('kelas', function ($routes) {
        $routes->get('/', 'MasterKelas::index');
        $routes->match(['get', 'post'], '(:num)/edit', 'MasterKelas::edit/$1');
        $routes->match(['get', 'post'], 'delete', 'MasterKelas::delete');
        $routes->match(['get', 'post'], 'add', 'MasterKelas::add');
    });

    $routes->group('help', function ($routes) {
        $routes->match(['get', 'post'], 'user', 'AdminHelp::index');
        $routes->match(['get', 'post'], 'teacher', 'AdminHelp::teacher');
    });
});

$routes->get('/', 'Users::index', ['filter' => 'UrlFilter']);
$routes->get('/admin', 'Users::index', ['filter' => 'UrlFilter2']);


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
