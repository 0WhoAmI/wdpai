<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::get('found', 'FoundController');
Routing::post('reportFinding', 'FoundController');
Routing::post('searchFoundDate', 'FoundController');
Routing::post('searchFoundCity', 'FoundController');
Routing::post('searchFoundSpecies', 'FoundController');
Routing::post('searchMicrochipNumber', 'FoundController');
Routing::post('lost', 'LostController');
Routing::post('reportLost', 'LostController');
Routing::post('searchLostDate', 'LostController');
Routing::post('searchLostCity', 'LostController');
Routing::post('searchLostSpecies', 'LostController');
Routing::post('searchMicrochipNumber', 'LostController');

Routing::run($path);
