<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('found', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('reportFinding', 'ReportFindingController');

Routing::run($path);
