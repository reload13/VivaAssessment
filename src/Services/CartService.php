<?php
declare(strict_types=1);

namespace Services;
use Library\Request;

class CartService {

    public function __construct()
    {
    }

    /**
     * @param Request $request
     */
    public function createCart(Request $request): array
    {
        $cart = [];
        $cart['amount_of_items'] = 0;
        $cart['cart_price'] = 0;
        $cart['total_price'] = 0;
        $cart['total_price_cents'] = 0;
        $cart['pids'] = "";

        foreach ($request->post['products'] as $product){
            if($product['amount'] == 0){
                continue;
            }
            $cart['products'][$product['id']]['id'] = $product['id'];
            $cart['products'][$product['id']]['amount'] = $product['amount'];
            $cart['products'][$product['id']]['price'] = $product['price'];
            $cart['amount_of_items'] = $cart['amount_of_items'] + $product['amount'];
            $cart['total_price'] +=  $product['amount']*$product['price'];
            $cart['total_price_cents'] += $product['amount']*$product['price']*100;
            $cart['pids'] .= empty($cart['pids'])?$product['id']:",".$product['id'];
        }


        return $cart;
    }


}