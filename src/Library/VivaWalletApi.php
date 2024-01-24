<?php

declare(strict_types=1);

namespace Library;

use Services\CartService;

class  VivaWalletApi
{
    private $token;
    private $basicAuthToken;
    private const CLIENT_ID = 'gcc576s72xrn2g2gle61th108q7jtb11l8bdbc4g3a2c5.apps.vivapayments.com';
    private const CLIENT_SECRET = '6o4023rNLx45BTf1y2yg79r2yQydsT';
    private const MERCHANT_ID = 'dc2ddfd8-b961-4358-a5c4-5aac1ce8dd6e';
    private const API_KEY = 'n+Wy[I';
    public function __construct()
    {
        $this->token = $this->getToken();
        $this->basicAuthToken = $this->getBasicAuthToken();
    }

    private function getBasicAuthToken():string
    {
        return base64_encode(self::MERCHANT_ID . ':' . self::API_KEY);
    }
    private function getToken():string
    {

        $clientIdAndSecret = base64_encode(self::CLIENT_ID . ':' . self::CLIENT_SECRET);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo-accounts.vivapayments.com/connect/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic '.$clientIdAndSecret,
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response);

        return $data->access_token;

    }

    public function createVivaOrder($data)
    {

        $postFields  = [
            'amount'              => $data['total_price_cents'],
            'customerTrns'        => 'E-ecommerce',
            'customer'            => [
                'email'       => $_SESSION['email'],
                'fullName'    => $_SESSION['firstname']." ".$_SESSION['lastname'],
//                'phone'       => '69xxxxxxxxx',
//                'countryCode' => 'GR',
//                'requestLang' => 'el-GR'
            ],
            'paymentTimeout'      => 1800,
            'preauth'             => true,
];


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo-api.vivapayments.com/checkout/v2/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($postFields),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->token,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response);

        return $data->orderCode;

    }

    public function retrieveOrder(int $orderCode){

        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo.vivapayments.com/api/orders/'.$orderCode,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$this->basicAuthToken
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
    public function retrieveTransaction(string $transactionId){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo-api.vivapayments.com/checkout/v2/transactions/%7B'.$transactionId.'%7D',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public function cancelOrder(string $orderCode){


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo.vivapayments.com/api/orders/'.$orderCode,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$this->basicAuthToken,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        return $response->Success;

    }

}