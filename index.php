<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::get('found', 'FoundController');
Routing::post('reportFinding', 'FoundController');
Routing::post('lost', 'LostController');
Routing::post('reportLost', 'LostController');

Routing::run($path);
