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

    $routes->get('/', 'Profile\Profile::index');

});
