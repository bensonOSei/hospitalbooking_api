<?php

namespace Benson\BookingApi\Controllers;

use Benson\BookingApi\Interfaces\User as InterfacesUser;
use Benson\BookingApi\Models\User;

class Customer extends User implements InterfacesUser
{
    public string $firstname;
    public string $lastname;
    public string $email;

    public string $phoneNumber;
    public string $password;
    public string $token;

    public function setDetails($firstname, $lastname, $email, $phoneNumber, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->password = $password;
    }

    public function signUp()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $idPrefix = "CST-";

        if ($this->createuser(
            $idPrefix,
            $this->firstname,
            $this->lastname,
            $this->email,
            $this->phoneNumber,
            $this->password
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function isAvailable($email)
    {
        if (count($this->getUserEmail($email)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    
    
    public function signIn()
    {
    }


    public function updateUser()
    {
    }

    public function deleteUser()
    {
    }
}
