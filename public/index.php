<?php

declare(strict_types=1);

error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
//ini_set("error_reporting", E_ALL);

define("ROOT_PATH", dirname(__DIR__));

spl_autoload_register(function (string $class_name) {

    require ROOT_PATH . "/src/" . str_replace("\\", "/", $class_name) . ".php";

});

$dotenv = new Library\Env;

$dotenv->load(ROOT_PATH . "/.env");

//set_error_handler("Framework\ErrorHandler::handleError");
//
//set_exception_handler("Framework\ErrorHandler::handleException");

$router = require ROOT_PATH . "/config/routes.php";

$container = require ROOT_PATH . "/config/services.php";


$dispatcher = new Library\Dispatcher($router, $container);

$request = Library\Request::createFromGlobals();

$response = $dispatcher->handle($request);

$response->send();