<?php

namespace Helper;

/**
 * CSRF protection implementation
 */
class CSRF
{
    public static function generateToken(): string
    {
        // use a hidden input field with a random token to prevent CSRF
        // store the token on the server side
        return $_SESSION['token'] = bin2hex(random_bytes(16));
    }

    public static function checkToken($token): bool
    {
        return isset($token) && isset($_SESSION['token']) && $token === $_SESSION['token'];
    }
}