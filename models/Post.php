<?php

namespace Models;

use Db\DB;
use \PDO;
class Post 
{

  public $userId;
  public $title;
  public $content;
  public function __construct($userId,$title,$content)
  {
    $this->userId=$userId;
    $this->title=$title;
    $this->content=$content;
  }
  public  static function all($userId)
  {
    $statement =DB::connect()->prepare("SELECT * FROM POSTS WHERE userId=:userId");
   $statement->execute(
      array(
        ':userId'=>$userId
        )
    );
    $posts =$statement->fetchAll(PDO::FETCH_OBJ);
    return $posts;
  }
  public  static function count()
  {
    $statement =DB::connect()->prepare("SELECT * FROM POSTS");
   $statement->execute();
    $posts =$statement->fetchAll(PDO::FETCH_OBJ);
    return count($posts);
  }
  public  static function create($post)
  {
    $statement = DB::connect()->prepare("INSERT INTO POSTS (userId,title,content) VALUES (:userId,:title,:content)");
    $state=$statement->execute(
      array(
        ':userId'=>$post->userId,
        ':title'=>$post->title,
        ':content'=>$post->content,
        )
    );
    return $state;
  }
  public  static function find($id)
  {
    $statement = DB::connect()->prepare("SELECT * FROM POSTS WHERE id=:postId");
    $statement->execute(array(':postId'=>$id));
    $post=$statement->fetch(PDO::FETCH_OBJ);
    return $post;
  }
  public  static function update($id,$post)
  {
    $statement = DB::connect()->prepare("UPDATE POSTS SET title=:title,content=:content WHERE id=:postId");
    $state=$statement->execute(array(':postId'=>$id,':title'=>$post->title,':content'=>$post->content));
    return $state;
  }
  public  static function delete($id)
  {
    $statement = DB::connect()->prepare("DELETE  FROM POSTS WHERE id=:postId");
    $statement->bindParam(":postId",$id,PDO::PARAM_INT);
    $statement->execute();
    return $statement;
  }
}

