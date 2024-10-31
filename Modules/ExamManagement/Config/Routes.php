<?php

$routes->group('course', static function ($routes) {
    $routes->get('/', '\Exam\Controllers\Course::index');
    $routes->post('/', '\Exam\Controllers\Course::bruh');
});

$routes->group('exam-score', static function ($routes) {
    $routes->get('/', '\Exam\Controllers\ExamScore::index');
    $routes->post('/', '\Exam\Controllers\ExamScore::bruh');
});
