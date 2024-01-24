<?php

namespace Validation;

class UserValidation
{
    public static function validate(array $data)
    {
        $errors = [];

        // Validate email
        if (!isset($data['email']) || !self::email($data['email'])) {
            $errors['email'] = "Invalid email address.";
        }

        // Validate password


        return $errors;
    }

    private static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

}
