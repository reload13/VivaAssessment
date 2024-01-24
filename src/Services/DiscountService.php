<?php
declare(strict_types=1);

namespace Services;
use Library\Request;

class DiscountService {

    public function __construct()
    {
    }


    public function addDiscount( $cart, Request $request): array
    {
        if(!isset($request->post['coupon'])){
            return $cart;
        }

        $products = [
            "apple" => "d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1",
            "pear" => "34d69140-d883-48d5-9af6-cecae5e653e2",
            "avocado" => "51405659-f333-4f68-871d-fe0fc4706678",
            "banana" => "34d69140-d883-48d5-9af6-cecae5e653e1",
            "cherry" => "4d69140-d883-48d5-9af6-cecae5e653e3",
            "strawberry" => "f02c5db3-35f2-4c30-b1b8-09d166417232",
        ];

        $discounts = [
            ["coupon"=>"SUMMER","type"=>"cart","discount_type"=>"price_from_total","value"=>20],
            ["coupon"=>"HAPPYBIRTHDAY","type"=>"cart","discount_type"=>"percentage_from_total","value"=>0.8],
            ["coupon"=>"ILIKEAPPLES","type"=>"cart_products","discount_type"=>"percentage_from_product","value"=>60,"pids"=>[$products['apple']]],
            ["coupon"=>"ILIKEPEARS","type"=>"cart_products","discount_type"=>"percentage_from_product","value"=>40,"pids"=>[$products['pear']]],
            ["coupon"=>"GREEN","type"=>"cart_products","discount_type"=>"percentage_from_product","value"=>30,"pids"=>[$products['pear'],$products['avocado']]]
        ];



        foreach ($discounts as $discount){
            if(isset($discount['coupon']) && $discount['coupon'] == $request->post['coupon']){
                $current_coupon = $discount;
                break;
            }
        }

        $cart['original_total_price'] = $cart['total_price'];

        if($current_coupon['type'] == "cart"){

            if($current_coupon['discount_type'] == "price_from_total"){

                $cart['total_price'] = $cart['total_price']-$current_coupon['value']/100;
                $cart['total_price_cents'] = $cart['total_price_cents']-$current_coupon['value'];
                $cart['discount_type'] = "cart_subs";

            }elseif ($current_coupon['discount_type'] == "percentage_from_total"){

                $cart['total_price'] = $cart['total_price']*$current_coupon['value'];
                $cart['total_price_cents'] = $cart['total_price_cents']*$current_coupon['value'];
                $cart['discount_type'] = "cart_perc";

            }

        }elseif ($current_coupon['type'] == "cart_products"){


            if($current_coupon['discount_type'] == "percentage_from_product"){

                $cart['total_price'] = 0;
                $cart['total_price_cents'] = 0;
                $cart['discount_type'] = "percentage_from_product";

                foreach ($cart['products'] as $product){

                    $discount = 1;

                    if(in_array($product['id'],$current_coupon['pids'])){
                        $discount = 1-$current_coupon['value']/100;
                    }


                    $cart['products'][$product['id']]['discounted_price'] = $product['price']*$discount;
                    $cart['total_price'] +=  $product['amount']*$product['price']*$discount;
                    $cart['total_price_cents'] += $product['amount']*$product['price']*100*$discount;
                }

            }
        }

        $cart['total_price'] =  round($cart['total_price'], 2);
        $cart['total_price_cents'] = round($cart['total_price_cents']);
        $cart['discount_percentage'] = $current_coupon['type'] == "cart"?$current_coupon['value']:round(100*($cart['original_total_price']-$cart['total_price'])/$cart['original_total_price']);

        return $cart;
    }


}