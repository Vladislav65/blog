<?php

//error_reporting (E_ALL);

require_once "services/Router.php";
session_start();

$router = new Router;
$router->routeStart();