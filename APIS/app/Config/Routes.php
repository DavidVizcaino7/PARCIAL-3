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
    $routes->get('Vista', 'Vista::index');

    // Rutas para gestionar usuarios en web (no API)
    $routes->get('usuarios', 'Usuarios::index');
    $routes->post('usuarios/insertar', 'Usuarios::insertar');
    $routes->post('usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1');
});

// Grupo para rutas API protegidas con filtro auth
// $routes->group('api', ['filter' => 'auth'], function($routes) {
$routes->group('api', function($routes) {
    //http://localhost/APIS/api/usuarios
    $routes->get('usuarios', 'ApiController::index');
    // http://localhost/APIS/api/usuarios
    $routes->post('usuarios', 'ApiController::create');
    // http://localhost/APIS/api/usuarios
    $routes->put('usuarios/(:num)', 'ApiController::update/$1');
    //http://localhost/APIS/api/usuarios/ID
    $routes->delete('usuarios/(:num)', 'ApiController::delete/$1');
    //PROBADOS 
});


