<?php

namespace Benson\BookingApi\Interfaces;

/**
 * Interface for the user classes
 */
interface User 
{
    public function signIn();
    public function signUp();
    public function updateUser();
    public function deleteUser();
}
