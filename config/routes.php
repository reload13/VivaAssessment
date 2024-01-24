<?php

$router = new Library\Router;

$router->add("/", ["controller" => "products", "action" => "index"]);

$router->add("/users/register", ["controller" => "users", "action" => "register"]);
$router->add("/users/login", ["controller" => "users", "action" => "login"]);
$router->add("/users/user_check", ["controller" => "users", "action" => "userLogin","method"=>"post"]);
$router->add("/users/create", [ "controller" => "users","action" => "create","method"=>"post"]);
$router->add("/users/success", [ "controller" => "users","action" => "create","method"=>"post"]);

$router->add("/orders/create", ["controller" => "orders", "action" => "create","method"=>"post"]);
$router->add("/admin/orders/delete", ["controller" => "orders", "action" => "delete","method"=>"post"]);
$router->add("/success.php", ["controller" => "orders", "action" => "success"]);
$router->add("/fail.php", ["controller" => "orders", "action" => "fail"]);
$router->add("/admin/orders", ["controller" => "orders", "action" => "index"]);

$router->add("admin/{controller}/{id:\d+}/show", ["action" => "show", "method" => "get"]);
$router->add("{controller}/{id:\d+}/edit", ["action" => "edit", "method" => "get"]);
$router->add("{controller}/{id:\d+}/update", ["action" => "update", "method" => "post"]);


return $router;