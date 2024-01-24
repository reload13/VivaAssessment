<?php

$container = new Library\Container;


$container->set(Library\Database::class, function() {

    return new Library\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);

});


$container->set(Library\TemplateInterface::class, function() {

    return new Library\PHPTemplate;

});

return $container;