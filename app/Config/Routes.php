<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// routes untuk halaman login
$routes->get('login', 'Auth::login');
// addRedirect localhost/auth agar mengarah ke localhost/login
$routes->addRedirect('auth', 'login');
// $routes->get('/', 'Home::index');
/* addRedirect digunakan untuk mengalihkan route yang lama yaitu '/' (localhost:8080), menjadi /home */
/* sehingga ketika mengakses dashboard akan mengarah ke /home */
$routes->addRedirect('/', 'home');
// routes get 'gawe' yg diarahkan ke controller Gawe function index
$routes->get('gawe', 'Gawe::index'); 
// routes get yg berisi fungsi membuat database dengan link create-db
$routes->get('create-db', function(){
	$forge = \Config\Database::forge();
	if ($forge->createDatabase('yuknikah'))
	{
		echo 'Database created!';
	}
});
// routes get 'gawe/add' yg diarahkan ke controller Gawe function create
$routes->get('gawe/add', 'Gawe::create');
// routes post 'gawe' yg diarahkan ke controller Gawe function store
$routes->post('gawe', 'Gawe::store');
// routes get 'gawe/edit/(:any) yg diarahkan ke controller Gawe function edit 
// :any akan menampung id_gawe
// routes yg muncul ketika klik icon edit
$routes->get('gawe/edit/(:num)', 'Gawe::edit/$1');
// routes yg muncul setelah klik tombol save di halaman update
$routes->put('gawe/(:any)', 'Gawe::update/$1');
// routes yg muncul setelah klik tombol delete di halaman gawe (tabel)
$routes->delete('gawe/(:segment)', 'Gawe::destroy/$1');

// routes presenter controller Group
$routes->presenter('groups');






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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}