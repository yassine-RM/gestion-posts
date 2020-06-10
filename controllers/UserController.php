<?php
namespace Controllers;
use Models\User;

class UserController
{

    public static function index()
    {
        $users = User::all();
        return $users;
    }
    public static function show($email)
    {
        $user = User::find($email);
        return $user;
    }
    public static function update($email,$user)
    {
        $state = User::update($email,$user);
        $user = User::find($email);
        $res=["state"=>$state,"user"=>$user];
        return $res;
    }
    public static function delete($id)
    {
        $state = User::delete($id);
        return $state;
    }
    public static function count()
    {
        $res = User::count();
        return $res;
    }
    public static function search($searchType,$searchText)
    {
        $res = User::search($searchType,$searchText);
        return $res;
    }
}

