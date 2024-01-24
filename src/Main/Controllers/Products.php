<?php

declare(strict_types=1);

namespace Main\Controllers;

use Main\Models\Product;
use Library\Controller;
use Library\Response;
use Services\PriceTransformerService;

//use Library\Exceptions\PageNotFoundException;

// Example controller
class Products extends Controller
{
    public function __construct(private Product $model,
                                private PriceTransformerService $priceTransformerService)
    {
    }

    public function index(): Response
    {

        $url = "https://demo0336234.mockable.io/products";
        $jsonData = file_get_contents($url);
        $products = json_decode($jsonData);

        $this->priceTransformerService->transformToEuros($products->products);

        return $this->view("Products/index.template.php", [
            "products" => $products,
        ]);
    }


    public function getProductName($id): string
    {

        $url = "https://demo0336234.mockable.io/products";
        $jsonData = file_get_contents($url);
        $products = json_decode($jsonData);

        foreach ($products->products as $k => $prod){
            if($prod->id == $id){
                return $prod->name;
            }
        }

        return "noName";
    }



}