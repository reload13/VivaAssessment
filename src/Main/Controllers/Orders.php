<?php

declare(strict_types=1);

namespace Main\Controllers;

use Main\Models\Order;
use Services\CartService;
use Controllers\PageNotFoundException;
use Library\Controller;
use Library\Response;
use Library\VivaWalletApi;
use Services\DiscountService;
use Services\SessionService;
use Services\MainService;
use Main\Controllers\Products;


// Example controller
class Orders extends Controller
{
    public function __construct(private Order $model,
                                private CartService $cart,
                                private Products $product,
                                private DiscountService $discountService,
                                private MainService $mainService,
                                private SessionService $session,
                                private VivaWalletApi $vivaWalletApi)

    {
    }


    public function fail(): Response
    {
        $statusIds = [
            'E' => 'The transaction was not completed successfully (PAYMENT UNSUCCESSFUL)'
        ];

        $data = [
            "orderCode"=>$this->request->session['viva_order_code'],
            "eventId"=>$this->request->get['eventId'],
        ];

        $vivaTransaction = $this->vivaWalletApi->retrieveTransaction($this->request->get['t']);
        $data['status_message'] = $statusIds[$vivaTransaction->statusId];


        return $this->view("Orders/fail.template.php", $data);
    }

    public function success(): Response
    {
        $__response = [
            "transactionId"=>$this->request->get['t'],
            "stateId"=>"3",
            "orderCode"=>$this->request->session['viva_order_code']
            ];

        $this->mainService->vivaRedirectOrderSuccess($__response);


        return $this->view("Orders/success.template.php", [

        ]);
    }
    public function index(): Response
    {
        $orders = $this->model->findAll();

        return $this->view("Admin/Orders/index.template.php", [
            "orders" => $orders,
        ]);
    }



    public function show(string $id): Response
    {
        $order = $this->model->find($id);

        $ordered_prods = explode(",",$order['Products']);
        foreach ($ordered_prods as $prod){
            $order["ordered_products"][] = $this->product->getProductName($prod);
        }


        return $this->view("Admin/Orders/show.template.php", [
            "order" => $order
        ]);
    }





    public function create(): Response
    {

        $cart = $this->cart->createCart($this->request);
        $cart = $this->discountService->addDiscount($cart,$this->request);

        $orderCode = $this->vivaWalletApi->createVivaOrder($cart);
        $this->session->updateSession(["viva_order_code"=>$orderCode]);


        $data = [
            "OrderCode" => $orderCode,
            "Products" => $cart["pids"],
            "StateId"=> "0",
            "Discount"=> empty($cart['discount_percentage'])?0:$cart['discount_percentage'],
            "Amount" => $cart["total_price"],
            "CustomerEmail"=>$_SESSION['email'],
            "CustomerFullname"=>$_SESSION['firstname']." ".$_SESSION['lastname']
        ];

        if ($this->model->insert($data)) {

            return $this->redirect("https://demo.vivapayments.com/web/checkout?ref=".$orderCode."");

//            return $this->redirect('https://demo.vivapayments.com/web/checkout?ref="'.$orderCode.'"');

        } else {

            return $this->view("Products/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);

        }
    }

    public function update(string $id): Response
    {
        $product = $this->getProduct($id);

        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if ($this->model->update($id, $product)) {

            return $this->redirect("/products/{$id}/show");

        } else {

            return $this->view("Products/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);

        }
    }

    public function delete(): Response
    {

        $orderCode = $this->request->post['OrderCode'];

        $checkCancelation = $this->vivaWalletApi->cancelOrder($orderCode);

        if($checkCancelation && $this->model->update($this->request->post['id'],["StateId"=>"2"])){

            $orders = $this->model->findAll();

            return $this->view("Orders/index.template.php", [
                "orders" => $orders
            ]);

        }
    }

}