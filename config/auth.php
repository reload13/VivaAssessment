<?php

return [
    "authenticated" => [
        '/admin/orders/\\d+/show' => ['A'],
        '/admin/orders' => ['A'],
        '/products/' => ['C'],
        '/success.php' => ['C'],
        '/fail.php' => ['C'],
        '/users/\\d+/edit' => ['C'],
        '/' => ['C']
    ],
    "public" => [
        "/users/login",
        "/users/register",

    ]
];