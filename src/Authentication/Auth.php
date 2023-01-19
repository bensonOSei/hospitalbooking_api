<?php
declare (strict_types=1);

namespace Benson\BookingApi\Authentication;

class Auth
{

    public static function verifyApiKey($key)
    {
        $apiKey = '9bb60056925095bd786b0ca9e874f439cc9d00400b834728c1840245ccb4a89d';

        if (hash_equals($apiKey, $key)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getHeaders(): bool | string
    {
        $headers = apache_request_headers();
        if (isset($headers['X-API-KEY'])) {
            return $headers['X-API-KEY'];
        } else {
            return false;
        }

        // return false;
    }
}

/**
 * TODO:
 * 1. Store the API key in a .env file
 * 2. Create a method to get the API key from the .env file
 * 3. Create a method to get the host of the sending request
 * 4. Modify the verifyApiKey method to check if the host of the sending request is the same as the host of the API
 * 5. Modify apiKey to include the host of the sending request
 */