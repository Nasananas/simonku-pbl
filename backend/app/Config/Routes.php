<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('user', 'User::index');
$routes->match(['post', 'options'], 'add/user', 'User::create');
$routes->match(['put', 'options'], 'update/user/(:segment)', 'User::update/$1');
$routes->match(['put', 'options'], 'edit/user/(:segment)', 'User::update/$1');
$routes->match(['delete', 'options'], 'delete/user/(:segment)', 'User::delete/$1');
$routes->match(['get', 'options'], 'edit/user/(:segment)', 'User::edit/$1');
$routes->get('update/user/(:segment)', 'User::update/$1');
$routes->get('user/(:segment)', 'User::get/$1');



$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->match(['post', 'options'], 'add/mahasiswa', 'Mahasiswa::create');
$routes->match(['put', 'options'], 'update/mahasiswa/(:segment)', 'Mahasiswa::update/$1');
$routes->match(['put', 'options'], 'edit/mahasiswa/(:segment)', 'Mahasiswa::update/$1');
$routes->match(['delete', 'options'], 'delete/mahasiswa/(:segment)', 'Mahasiswa::delete/$1');
$routes->match(['get', 'options'], 'edit/mahasiswa/(:segment)', 'Mahasiswa::edit/$1');
$routes->get('update/mahasiswa/(:segment)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/(:segment)', 'Mahasiswa::get/$1');

$routes->get('dosen', 'Dosen::index');
$routes->match(['post', 'options'], 'add/dosen', 'Dosen::create');
$routes->match(['put', 'options'], 'update/dosen/(:segment)', 'Dosen::update/$1');
$routes->match(['put', 'options'], 'edit/dosen/(:segment)', 'Dosen::update/$1');
$routes->match(['delete', 'options'], 'delete/dosen/(:segment)', 'Dosen::delete/$1');
$routes->match(['get', 'options'], 'edit/dosen/(:segment)', 'Dosen::edit/$1');
$routes->get('update/dosen/(:segment)', 'Dosen::update/$1');
$routes->get('dosen/(:segment)', 'Dosen::get/$1');

$routes->get('iku1', 'Iku1::index');
$routes->match(['post', 'options'], 'add/iku1', 'Iku1::create');
$routes->match(['put', 'options'], 'update/iku1/(:segment)', 'Iku1::update/$1');
$routes->match(['put', 'options'], 'edit/iku1/(:segment)', 'Iku1::update/$1');
$routes->match(['delete', 'options'], 'delete/iku1/(:segment)', 'Iku1::delete/$1');
$routes->match(['get', 'options'], 'edit/iku1/(:segment)', 'Iku1::edit/$1');
$routes->get('update/iku1/(:segment)', 'Iku1::update/$1');
$routes->get('iku1/(:segment)', 'Iku1::get/$1');
$routes->get('import/iku1', 'Iku1::import');
$routes->options('import/iku1', 'Iku1::options');
$routes->match(['post', 'options'], 'import/iku1', 'Iku1::import');
$routes->match(['post', 'get'], 'iku1/import', 'Iku1::import');
$routes->post('iku1/importExcel', 'Iku1::import');
$routes->get('iku1/rekap', 'Iku1::rekap');










$routes->get('iku2', 'Iku2::index');
$routes->match(['post', 'options'], 'add/iku2', 'Iku2::create');
$routes->match(['put', 'options'], 'update/iku2/(:segment)', 'Iku2::update/$1');
$routes->match(['put', 'options'], 'edit/iku2/(:segment)', 'Iku2::update/$1');
$routes->match(['delete', 'options'], 'delete/iku2/(:segment)', 'Iku2::delete/$1');
$routes->match(['get', 'options'], 'edit/iku2/(:segment)', 'Iku2::edit/$1');
$routes->get('update/iku2/(:segment)', 'Iku2::update/$1');
$routes->post('update/iku2/(:segment)', 'Iku2::update/$1');
$routes->get('iku2/(:segment)', 'Iku2::get/$1');




$routes->get('iku3', 'Iku3::index');
$routes->match(['post', 'options'], 'add/iku3', 'Iku3::create');
$routes->match(['put', 'options'], 'update/iku3/(:segment)', 'Iku3::update/$1');
$routes->match(['put', 'options'], 'edit/iku3/(:segment)', 'Iku3::update/$1');
$routes->match(['delete', 'options'], 'delete/iku3/(:segment)', 'Iku3::delete/$1');
$routes->match(['get', 'options'], 'edit/iku3/(:segment)', 'Iku3::edit/$1');
$routes->get('update/iku3/(:segment)', 'Iku3::update/$1');
$routes->get('iku3/(:segment)', 'Iku3::get/$1');
