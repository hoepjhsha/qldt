<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**
 * ------------------------------------------------------------------------
 *  Routes setup
 * ------------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * ------------------------------------------------------------------------
 *  Routes Definition
 * ------------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories
$routes->get('welcome', 'Home::index');

/**
 * ------------------------------------------------------------------------
 *  Additional Routes
 * ------------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

/**
 * ------------------------------------------------------------------------
 *  Include Modules Routes Files
 * ------------------------------------------------------------------------
 */
if (file_exists(ROOTPATH . 'Modules')) {
    $modulePath = ROOTPATH . 'Modules';
    $modules    = scandir($modulePath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') {
            continue;
        }
        if (is_dir($modulePath) . '/' . $module) {
            $routesPath = $modulePath . '/' . $module . '/Config/Routes.php';
            if (file_exists($routesPath)) {
                require $routesPath;
            } else {
                continue;
            }
        }
    }
}
