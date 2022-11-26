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
$routes->setAutoRoute(true);
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
// $routes->get('/', 'Home::index');
// $routes->get('/home', 'Home::index');
// $routes->get('/auth', 'auth::index');
// $routes->get('/auth/index', 'auth::index');
// $routes->post('/auth/cek_login', 'auth::cek_login');
// $routes->get('/admin', 'admin::index');
// $routes->get('/auth/logout', 'auth::logout');
// $routes->get('/kelas', 'kelas::index');
// $routes->post('/kelas/add', 'kelas::add');
// $routes->post('/kelas/edit', 'kelas::edit');
// $routes->post('/kelas/edit/(:any)', 'kelas::edit/$1');
// $routes->get('/kelas/delete/(:any)', 'kelas::delete/$1');
// $routes->get('/mapel', 'mapel::index');
// $routes->get('/mapel/add', 'mapel::add');
// $routes->post('/mapel/insert', 'mapel::insert');
// $routes->get('/mapel/edit', 'mapel::edit/$1');
// $routes->get('/mapel/edit/(:any)', 'mapel::edit/$1');
// $routes->post('/mapel/update/(:any)', 'mapel::update/$1');
// $routes->get('/mapel/delete/(:any)', 'mapel::delete/$1');
// $routes->get('/tp', 'tp::index');
// $routes->post('/tp/add', 'tp::add');
// $routes->post('/tp/edit', 'tp::edit');
// $routes->post('/tp/edit/(:any)', 'tp::edit/$1');
// $routes->get('/tp/delete/(:any)', 'tp::delete/$1');
// $routes->get('/tp/setting', 'tp::setting');
// $routes->get('/tp/set_status_tp/(:any)', 'tp::set_status_tp/$1');
// $routes->get('/mapel/edit', 'mapel::detail');
// $routes->get('/mapel/detail/(:any)', 'mapel::detail/$1');
// $routes->post('/mapel/add', 'mapel::add');
// $routes->post('/mapel/add/(:any)', 'mapel::add/$1');
// $routes->get('/user', 'user::index');
// $routes->post('/user/add', 'user::add');
// $routes->post('/user/edit', 'user::edit');
// $routes->post('/user/edit/(:any)', 'user::edit/$1');
// $routes->get('/user/delete/(:any)', 'user::delete/$1');
// $routes->get('/guru', 'guru::index');
// $routes->get('/guru/add', 'guru::add');
// $routes->post('/guru/insert', 'guru::insert');
// $routes->get('/guru/edit', 'guru::edit/$1');
// $routes->get('/guru/edit/(:any)', 'guru::edit/$1');
// $routes->post('/guru/update/(:any)', 'guru::update/$1');
// $routes->get('/guru/delete/(:any)', 'guru::delete/$1');
// $routes->get('/siswa', 'siswa::index');
// $routes->get('/siswa/add', 'siswa::add');
// $routes->post('/siswa/insert', 'siswa::insert');
// $routes->get('/siswa/edit', 'siswa::edit/$1');
// $routes->get('/siswa/edit/(:any)', 'siswa::edit/$1');
// $routes->post('/siswa/update/(:any)', 'siswa::update/$1');
// $routes->get('/siswa/delete/(:any)', 'siswa::delete/$1');
// $routes->get('/rombel', 'rombel::index');
// $routes->post('/rombel/add', 'rombel::add');
// $routes->post('/rombel/insert', 'rombel::insert');
// $routes->get('/rombel/delete/(:any)', 'rombel::delete/$1');
// $routes->get('/rombel/detail_rombel/(:any)', 'rombel::detail_rombel/$1');
// $routes->get('/rombel/rekrut_siswa/(:any)', 'rombel::rekrut_siswa/$1');
// $routes->get('/rombel/buang_siswa/(:any)', 'rombel::buang_siswa/$1');
// $routes->get('/jadwalpelajaran', 'jadwalpelajaran::index');
// $routes->get('/jadwalpelajaran/detail_jadwal/(:any)', 'jadwalpelajaran::detail_jadwal/$1');
// $routes->post('/jadwalpelajaran/add/(:any)', 'jadwalpelajaran::add/$1');
// $routes->get('/jadwalpelajaran/delete/(:any)', 'jadwalpelajaran::delete/$1');
// $routes->get('/halsiswa', 'halsiswa::index');
// $routes->get('/halguru', 'halguru::index');



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
