<?php

declare(strict_types=1);

namespace Models;

use Library\Model;
use PDO;

// Example model
class Product extends Model
{
     protected $table = "products";

    protected function validate(array $data): void
    {
//        if (empty($data["name"])) {
//
//            $this->addError("name", "Name is required");
//
//        }
    }

}