<?php

namespace Services;

class SessionService
{

    public function updateSession(array $data)
    {
        foreach ($data as $k => $value) {
            $_SESSION[$k] = $value;
        }
    }

    public function clearSession()
    {
        $_SESSION = [];

        session_destroy();
    }

}
