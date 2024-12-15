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
