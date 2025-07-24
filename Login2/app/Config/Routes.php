<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para Login (públicas)
$routes->get('login', 'Login::index');
$routes->post('login/validar', 'Login::validar');
$routes->get('login/logout', 'Login::logout');

// Rutas protegidas, accesibles solo si el usuario está logueado
$routes->group('', ['filter' => 'auth'], function($routes) {
    // Ruta protegida después del login
    $routes->get('Inicio', 'Inicio::index');
});
