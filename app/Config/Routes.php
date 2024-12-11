<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('Home/viewKriteria', 'Home::viewKriteria');
$routes->get('Home/viewAlternatif', 'Home::viewAlternatif');
$routes->get('Home/viewBobotPenilaian', 'Home::viewBobotPenilaian');
$routes->get('Home/viewBobot', 'Home::viewBobot');
$routes->get('Home/viewMatriks', 'Home::viewMatriks');
$routes->get('Home/callviewnormalisasi', 'Home::callviewnormalisasi');
$routes->get('Home/callbobotpreferensi', 'Home::callbobotpreferensi');
$routes->get('Home/callperankingan', 'Home::callperankingan');
$routes->get('Home/tambahalternatif', 'Home::tambahalternatif');
$routes->get('Home/deletealternatif/(:any)', 'Home::deletealternatif/$1');
$routes->post('Home/simpanalternatif', 'Home::simpanalternatif');
$routes->get('Home/editalternatif/(:segment)', 'Home::editalternatif/$1');
$routes->post('Home/updatealternatif', 'Home::updatealternatif');
$routes->get('/Home/viewMatriks', 'Home::viewMatriks');
$routes->get('/Home/tambahmatriks', 'Home::tambahmatriks');
$routes->post('/Home/simpanmatriks', 'Home::simpanmatriks');
$routes->get('/Home/editmatriks/(:num)', 'Home::editmatriks/$1');
$routes->post('/Home/updatematriks', 'Home::updatematriks');
$routes->get('/Home/deletematriks/(:num)', 'Home::deletematriks/$1');
$routes->get('Home/editKriteria/(:num)', 'Home::editKriteria/$1');
$routes->post('Home/updateKriteria', 'Home::updateKriteria');
$routes->get('Home/deleteKriteria/(:num)', 'Home::deleteKriteria/$1');


