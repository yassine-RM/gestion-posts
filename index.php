<?php

require_once "vendor/autoload.php";

$userPages = ['newUser', 'editUser', 'showUser', 'users', 'deleteUser', 'userPosts','profile'];
$postPages = ['newPost', 'editPost', 'showPost', 'posts','deletePost'];
$authPages = ['login', 'register', 'logOut'];


if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (in_array($page, $authPages)) {

        $content = ["page" => "$page.php", "path" => "auth"];
        include_once('views/layout/auth.php');
    } else {
        if (in_array($page, $userPages)) {

            $content = ["page" => "$page.php", "path" => "user"];
        } elseif (in_array($page, $postPages)) {

            $content = ["page" => "$page.php", "path" => "post"];
        } else
            $content = ["page" => "404.php", "path" => "includes"];

            include_once('views/layout/master.php');
    }
} else{
    $content = ["page" => "home.php", "path" => "views"];
include_once('views/layout/master.php');
}