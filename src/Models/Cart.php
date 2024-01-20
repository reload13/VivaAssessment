<?php

declare(strict_types=1);

namespace Models;

use Library\Model;
use PDO;

// Example model
class Cart extends Model
{
     protected $table = "orders";

    protected function validate(array $data): void
    {
//        if (empty($data["name"])) {
//
//            $this->addError("name", "Name is required");
//
//        }
    }

}