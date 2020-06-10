<?php

namespace Middleware;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class isAdmin{



    public static function check(){

        if ($_SESSION['userConnected']->status) {
           return true;
        }
        else
        header('location:/gestion-posts');
    }

}