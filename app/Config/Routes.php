<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');    
$routes->get('/', 'UserController::userindex');
$routes->get('/adminindex', 'UserController::adminindex',['filter' => 'authGuard']);
$routes->get('login', 'UserController::logindex');
$routes->get('regindex', 'UserController::regindex');
$routes->match(['get', 'post'], 'UserController/store', 'UserController::store');
$routes->match(['get', 'post'], 'UserController/loginAuth', 'UserController::loginAuth');
$routes->get('/logout', 'UserController::logout');
$routes->match(['get','post'], 'saveProduct', 'UserController::saveProduct');
$routes->post('editProduct', 'UserController::editProduct');

$routes->get('/viewtshirts', 'UserController::tshirts');
$routes->get('/viewshorts', 'UserController::shorts');
$routes->get('/viewjackets', 'UserController::jackets');
$routes->get('/viewshoes', 'UserController::shoes');
$routes->get('/viewbags', 'UserController::bags');
$routes->get('/viewjeans', 'UserController::jeans');

$routes->post('UserController/deletethistoo', 'UserController::deletethistoo');

