<?php
declare(strict_types=1);

namespace Services;

class PriceTransformerService {


    public function transformToEuros(array $data): array
    {

        foreach ($data as &$product) {
            $product->price = $this->centsToEuros($product->price);
        }

        return $data;
    }

    private function centsToEuros(int $priceInCents): float
    {
        return $priceInCents / 100.0;
    }


}