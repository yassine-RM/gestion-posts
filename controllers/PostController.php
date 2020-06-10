<?php
namespace Controllers;
use Models\Post;
class PostController{

    public static function index($userId)
    {
        $posts = Post::all($userId);
        return $posts;
    }
    public static function create($post)
    {
        $state = Post::create($post);
        return $state;
    }
    public static function show($id)
    {
        $post = Post::find($id);
        return $post;
    }
    public static function update($id,$post)
    {
        $state = Post::update($id,$post);
        $post = Post::find($id);
        $res=["state"=>$state,"post"=>$post];
        return $res;
    }
    public static function delete($id)
    {
        $state = Post::delete($id);
        return $state;
    }
    public static function count()
    {
        $res = Post::count();
        return $res;
    }
    
}