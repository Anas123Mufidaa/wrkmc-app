<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', function ($routes) {
    $routes->get('', 'Home::index');
});
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Login::index');
    $routes->post('login/cek', 'Login::cekLogin');
    $routes->get('logout', 'Login::logout');
});
$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('profile', function ($routes) {
    $routes->get('/', 'Profile\Profile::index');
    $routes->post('update-profile/(:num)', 'Profile\Profile::updateProfile/$1');
    $routes->post('update-password', 'Profile\Profile::updatePassword');

    $routes->get('user', 'Profile\User::index');
    $routes->post('user/save', 'Profile\User::save');
    $routes->post('user/update-by/(:num)', 'Profile\User::updateBy/$1');
    $routes->get('user/delete/(:segment)', 'Profile\User::delete/$1');
});
$routes->group('sda', function ($routes) {
    $routes->get('/', 'Sda\SumberDayaAir::index');
    $routes->get('detail/(:num)', 'Sda\SumberDayaAir::detail/$1');
    $routes->post('save', 'Sda\SumberDayaAir::save');
    $routes->post('update-by/(:num)', 'Sda\SumberDayaAir::updateBy/$1');
    $routes->get('delete/(:segment)', 'Sda\SumberDayaAir::delete/$1');

    $routes->get('penilaian-kinerja', 'Sda\PenilaianKinerja::index');
    $routes->get('penilaian-kinerja/detail/(:num)', 'Sda\PenilaianKinerja::detail/$1');
    $routes->post('penilaian-kinerja/save', 'Sda\PenilaianKinerja::save');
    $routes->post('penilaian-kinerja/update-by/(:num)', 'Sda\PenilaianKinerja::updateBy/$1');
    $routes->get('penilaian-kinerja/delete/(:segment)', 'Sda\PenilaianKinerja::delete/$1');
});
$routes->group('bencana', function ($routes) {
    $routes->get('/', 'Bencana\Bencana::index');
    $routes->get('detail/(:num)', 'Detail\Bencana::detail/$1');
    $routes->get('create', 'Bencana\Bencana::create');
    $routes->post('save', 'Bencana\Bencana::save');
    $routes->get('edit/(:num)', 'Bencana\Bencana::edit/$1');
    $routes->post('update-by/(:num)', 'Bencana\Bencana::updateBy/$1');
    $routes->get('delete/(:segment)', 'Bencana\Bencana::delete/$1');
});
