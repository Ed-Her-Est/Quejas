<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'FrontendController::index');
// $routes->get('/', 'Home::index');
$routes->get('/', 'UserController::login', ["filter" => "noauth"]);

$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);

//$routes->get('areasQueja', 'AreasQuejasController::index');


$routes->get('contacto', 'FrontendController::contacto');




// Rutas para la recuperación de contraseña
/* $routes->get('forgot-password', 'UserController::forgotPasswordForm');
$routes->post('forgot-password', 'UserController::forgotPassword');
$routes->get('reset-password/(:any)', 'UserController::resetPasswordForm/$1');
$routes->post('reset-password', 'UserController::resetPassword'); */


// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1');
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1');

    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->get('quejas', 'Admin\QuejasController::index');
    $routes->get('quejas/show/(:num)', 'Admin\QuejasController::show/$1');
    $routes->get('quejas/feedback/(:num)', 'Admin\QuejasController::feedback/$1');
    $routes->post('quejas/feedback/(:num)', 'Admin\QuejasController::feedback/$1');
    $routes->get('quejas/retroalimentaciones/(:num)', 'Admin\QuejasController::retroalimentaciones/$1');
    $routes->post('quejas/retroalimentaciones/(:num)', 'Admin\QuejasController::retroalimentaciones/$1');
    
});

// Rutas para el Usuario
$routes->group('usuario', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Usuario\UsuarioController::index');
    $routes->get('aadmin', 'Usuario\AAdminController::index');
    $routes->post('aadmin/insert', 'Usuario\AAdminController::insert');
    $routes->get('aacademica', 'Usuario\AAcademicaController::index');
    $routes->post('aacademica/insert', 'Usuario\AacademicaController::insert');
    $routes->get('cafeteria', 'Usuario\CafeteriaController::index');
    $routes->post('cafeteria/insert', 'Usuario\CafeteriaController::insert');
    $routes->post('mquejas/feedback/insert', 'Usuario\MQuejasController::insert');
    $routes->get('cescolar', 'Usuario\CEscolarController::index');
    $routes->post('cescolar/insert', 'Usuario\CEscolarController::insert');
    $routes->get('mquejas', 'Usuario\MQuejasController::index');
    $routes->post('mquejas/submit', 'Usuario\MQuejasController::submit');
    $routes->get('papeleria', 'Usuario\PapeleriaController::index');
    $routes->post('papeleria/insert', 'Usuario\PapeleriaController::insert');
    $routes->post('mquejas', 'control::function', ['as' => 'alias', 'filter' => 'filter']);
    $routes->get('mquejas/show/(:num)', 'Usuario\MQuejasController::show/$1');
    $routes->get('mquejas/feedback/(:num)', 'Usuario\MQuejasController::feedback/$1');
    $routes->post('cafeteria/insert', 'Usuario\CafeteriaController::insert');
    $routes->post('mquejas/feedback/(:num)', 'Usuario\MQuejasController::feedback/$1');
    $routes->get('mquejas/feedback', 'Usuario\MQuejasController::feedback');







});

/*mquejas
//$routes->get('/mquejas', 'Mquejas::index');
$routes->get('/mquejas/mostrar', 'Mquejas::mostrar');
$routes->post('/mquejas/mostrar', 'Mquejas::mostrar');
$routes->get('/mquejas/agregar', 'Mquejas::agregar');
$routes->get('/mquejas/editar/(:num)', 'Mquejas::editar/$1');
$routes->get('/mquejas/buscar', 'Mquejas::buscar');
$routes->get('/mquejas/delete/(:num)', 'Mquejas::delete/$1');
$routes->post('/mquejas/delete/(:num)', 'Mquejas::delete/$1');
$routes->post('/mquejas/insert', 'Mquejas::insert');
$routes->post('/mquejas/update', 'Mquejas::update');
$routes->delete('/mquejas/delete/(:num)', 'Mquejas::delete/$1');
*/

















//ruta para Finalizar Session
$routes->get('logout', 'UserController::logout');