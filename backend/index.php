<?php

header('Content-Type: application/json; charset=UTF-8');

require_once __DIR__ . '/src/config/env.php';
require_once __DIR__ . '/src/routes/api.php';

$method = $_SERVER['REQUEST_METHOD'];

$path = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);

$basePath = parse_url(
    env('APP_URL'),
    PHP_URL_PATH
);

if ($basePath && str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath));
}

$path = preg_replace(
    '#^/index\.php(?=/|$)#',
    '',
    $path
);

$path = '/' . trim($path, '/');

handleRequest($method, $path);