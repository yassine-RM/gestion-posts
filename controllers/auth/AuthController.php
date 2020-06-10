<?php
namespace Controllers\auth;
use Models\User;
session_start();

class AuthController
{

    public static function login($email,$password)
    {
        $user = User::login($email,$password);
        return $user;
    }
    public static function register($user)
    {
        $state = User::create($user);
        if($state){
            $_SESSION['userConnected']=$user;
        }
        return $state;
    }
  
}


