<?php

declare(strict_types=1);

//error_reporting(E_ALL);


define("ROOT_PATH", dirname(__DIR__));

session_start();

spl_autoload_register(function (string $class_name) {

    require ROOT_PATH . "/src/" . str_replace("\\", "/", $class_name) . ".php";

});

$dotenv = new Library\Env;

$dotenv->load(ROOT_PATH . "/.env");

$router = require ROOT_PATH . "/config/routes.php";

$container = require ROOT_PATH . "/config/services.php";

$auth = require ROOT_PATH . "/config/auth.php";


$dispatcher = new Library\Dispatcher($router, $container, $auth);

$request = Library\Request::createFromGlobals();

$response = $dispatcher->handle($request);

$response->send();