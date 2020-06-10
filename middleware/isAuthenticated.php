<?php

namespace Middleware;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class isAuthenticated{



    public static function isAuth(){

        if (isset($_SESSION['userConnected'])) {
           return true;
        }
        else
        header('location:login');
    }

}