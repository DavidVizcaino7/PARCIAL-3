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
    $routes->get('Vista', 'Vista::index');  // Mantienes esta si la usas aún

    // Rutas para gestionar usuarios
    $routes->get('usuarios', 'Usuarios::index');                  // Mostrar lista usuarios
    $routes->post('usuarios/insertar', 'Usuarios::insertar');     // Insertar usuario
    $routes->post('usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1'); // Eliminar usuario
});
