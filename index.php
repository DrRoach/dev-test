<?php

require 'vendor/autoload.php';
require_once 'autoload.php';

use Routes\Route;

// Handle the routing of the URL
$router = new Route();

// Find the correct controller and method to call using the path. If PATH_INFO isn't set then default to `/`
$routeCall = $router->findRoute($_SERVER['PATH_INFO'] ?? "/");

// If findRoute() returns null then the requested route doesn't exist
if ($routeCall === null) {
    http_response_code(404);
    exit;
}

// Call the correct Controller and Method
$controller = new $routeCall['controller']();
$methodCall = $routeCall['method'];
$controller->$methodCall();
