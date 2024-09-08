<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login_Form','Home::Login');
$routes->get('signUp_Form','Home::SignUp');
$routes->get('back_Form','Home::Back');
$routes->post('logintodolist/validation', 'Home::validation');
$routes->post('todolist', 'TodolistController::index');
$routes->post('todolist/simpan', 'TodolistController::simpankegiatan');
$routes->get('todolist/selesai/(:segment)', 'TodolistController::selesaikegiatan');
$routes->get('todolist/hapus/(:segment)', 'TodolistController::hapuskegiatan');
$routes->post('signUp/validation', 'Home::inputData');
