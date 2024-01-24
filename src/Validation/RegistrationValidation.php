<?php

namespace Validation;

class RegistrationValidation
{
    public static function validate(array $data)
    {
        $errors = [];

        // Validate email
        if (!isset($data['email']) || !self::email($data['email'])) {
            $errors['email'] = "Invalid email address.";
        }

        // Validate password
        if (!isset($data['password']) || !self::validPassword($data['password'])) {
            $errors['password'] = "Invalid password. It should be at least 8 characters long and contain numbers.";
        }

        return $errors;
    }

    private static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private static function validPassword($value)
    {
        // Password should be at least 8 characters long and contain numbers
        return strlen($value) >= 8 && preg_match('/\d/', $value);
    }
}
