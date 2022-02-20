<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Controller\Pages\Home;
use App\Http\Response;
use App\Http\Router;

define('URL', 'http://localhost');

$router = new Router(URL);

$router->get('/', [
    function() {
        return new Response(200, Home::getHome());
    }
]);


