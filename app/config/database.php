<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$envHost = getenv('DB_HOST') ?: '';
$envPort = getenv('DB_PORT') ?: '';
$envUser = getenv('DB_USERNAME') ?: getenv('DB_USER') ?: '';
$envPass = getenv('DB_PASSWORD') ?: '';
$envDb   = getenv('DB_NAME') ?: getenv('DB_DATABASE') ?: '';

$hasRealEnv = $envHost !== '' && $envUser !== '' && $envDb !== '';

$mainHost = $hasRealEnv ? $envHost : 'mysql-3281339a-erichatucio-2b3d.g.aivencloud.com';
$mainPort = $hasRealEnv ? ($envPort ?: '28459') : '28459';
$mainUser = $hasRealEnv ? $envUser : 'avnadmin';
$mainPass = $hasRealEnv ? $envPass : '';
$mainDb   = $hasRealEnv ? $envDb : 'newdb';

$database['main'] = array(
    'driver' => getenv('DB_CONNECTION') ?: getenv('DB_DRIVER') ?: 'mysql',
    'hostname' => $mainHost,
    'port' => $mainPort,
    'username' => $mainUser,
    'password' => $mainPass,
    'database' => $mainDb,
    'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
    'dbprefix' => getenv('DB_PREFIX') ?: '',
    'path' => getenv('DB_PATH') ?: ''
);

$database['products'] = array(
    'driver' => getenv('DB_CONNECTION') ?: getenv('DB_DRIVER') ?: 'mysql',
    'hostname' => $mainHost,
    'port' => $mainPort,
    'username' => $mainUser,
    'password' => $mainPass,
    'database' => getenv('PRODUCTS_DB_NAME') ?: 'newdb',
    'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
    'dbprefix' => getenv('DB_PREFIX') ?: '',
    'path' => getenv('DB_PATH') ?: ''
);
?>