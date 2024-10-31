<?php
/**
 * ----------------------------------------------------------------
 *  Define User Student Routes
 * ----------------------------------------------------------------
 */
$routes->group('student', static function ($routes) {
    $routes->get('/', '\User\Controllers\Student::index');
	$routes->post('/', '\User\Controllers\Student::crud');
});
