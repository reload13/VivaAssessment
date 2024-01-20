<?php

declare(strict_types=1);

namespace Controllers;

use Library\Controller;
use Library\Response;


class Layout extends Controller
{
    public function index(): Response
    {
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'city' => 'Example City',
        ];

// Create a stdClass object
//        $response = new stdClass();
//        $response->status = 'success';
//        $response->data = $data;

// Convert response to JSON
//        $jsonData = json_encode($response);

// Set the Content-Type header to indicate JSON
//        header('Content-Type: application/json');

// Output the JSON data
        return $this->view("Products/index.mvc.php", [
            "products" => $data,
            "total" => "10"
        ]);
    }
}