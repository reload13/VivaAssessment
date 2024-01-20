<?php

declare(strict_types=1);

namespace Models;

use Library\Model;
use PDO;

// Example model
class User extends Model
{
    protected $table = "users";

    protected function validate(array $data): void
    {
//        if (empty($data["name"])) {
//
//            $this->addError("name", "Name is required");
//
//        }
    }

}