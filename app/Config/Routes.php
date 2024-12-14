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
    $routes->get('/', 'Profile::index');
    $routes->post('profile/update-profile/(:num)', 'Profile::updateProfile/$1');
    $routes->post('profile/update-password', 'Profile::updatePassword');
});

