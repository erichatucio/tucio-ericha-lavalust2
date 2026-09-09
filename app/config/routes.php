<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/** @var object $router **/

$router->get('/', 'AuthController::login');
$router->get('login', 'AuthController::login');
$router->post('authenticate', 'AuthController::authenticate');
$router->get('logout', 'AuthController::logout');

$router->get('users', 'UsersController::index');

$router->get('products', 'ProductController::index')->middleware('auth');
$router->get('products/create', 'ProductController::create')->middleware('auth');
$router->post('products/store', 'ProductController::store')->middleware('auth');
$router->get('products/edit/{id}', 'ProductController::edit')->where_number('id')->middleware('auth');
$router->post('products/update/{id}', 'ProductController::update')->where_number('id')->middleware('auth');
$router->get('products/delete/{id}', 'ProductController::delete')->where_number('id')->middleware('auth');