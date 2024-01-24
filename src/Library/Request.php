<?php

declare(strict_types=1);

namespace Library;

class Request
{
    public function __construct(public string $uri,
                                public string $method,
                                public array $get,
                                public array $post,
                                public array $files,
                                public array $cookie,
                                public array $server,
                                public array $session
    )
    {
    }

    public static function createFromGlobals()
    {

        return new static(
            $_SERVER["REQUEST_URI"],
            $_SERVER["REQUEST_METHOD"],
            $_GET,
            $_POST,
            $_FILES,
            $_COOKIE,
            $_SERVER,
            $_SESSION
        );
    }
}