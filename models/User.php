<?php

namespace Models;
use Db\DB;
use \PDO;

class User 
{

  public $firstName;
  public $lastName;
  public $adress;
  public $email;
  public $status;
  public $password;

  public function __construct($firstName,$lastName,$adress,$status=0,$email="remmanidev@gmail.com",$password="123456")
  {
    $this->firstName=$firstName;
    $this->lastName=$lastName;
    $this->adress=$adress;
    $this->email=$email;
    $this->status=$status;
    $this->password=$password;
  }

  public  static function all()
  {
    $users =DB::connect()->query("SELECT * FROM USERS");
    $data = $users->fetchAll(PDO::FETCH_OBJ);
    return $data;
  }
  public  static function count()
  {
    $statement =DB::connect()->prepare("SELECT * FROM USERS");
   $statement->execute();
    $users =$statement->fetchAll(PDO::FETCH_OBJ);
    return count($users);
  }
  public  static function search($searchType,$searchText)
  {

    if ($searchType=="firstName") {
      $query="SELECT * FROM USERS WHERE firstName LIKE '%$searchText%'";
    }
   else if ($searchType=="lastName") {
      $query="SELECT * FROM USERS WHERE lastName LIKE '%$searchText%'";
    }
   else if ($searchType=="email") {
      $query="SELECT * FROM USERS WHERE email LIKE '%$searchText%'";
    }
   else if ($searchType=="adress") {
      $query="SELECT * FROM USERS WHERE adress LIKE '%$searchText%'";
    }
   else {
      $query="SELECT * FROM USERS";
    }
    $statement = DB::connect()->prepare($query);
    $statement->execute();
    $users=$statement->fetchAll(PDO::FETCH_OBJ);
    return $users;
  }
  public  static function find($email)
  {
    $statement = DB::connect()->prepare("SELECT * FROM USERS WHERE email=:email");
    $statement->execute(array(':email'=>$email));
    $user=$statement->fetch(PDO::FETCH_OBJ);
    return $user;
  }
  public  static function login($email,$password)
  {
    $statement = DB::connect()->prepare("SELECT * FROM USERS WHERE email=:email AND pwd=:pwd");
    $statement->execute(array(
      ':email'=>$email,
      ':pwd'=>$password,
    ));
    $user=$statement->fetch(PDO::FETCH_OBJ);
    return $user;
  }
  public  static function create($user)
  {
    $getUser=static::find($user->email);
    if(!$getUser){
    $statement = DB::connect()->prepare("INSERT INTO USERS (firstName,lastName,email,adress,pwd) VALUES (:firstName,:lastName,:email,:adress,:pwd)");
    $state=$statement->execute(
      array(
        ':firstName'=>$user->firstName,
        ':lastName'=>$user->lastName,
        ':adress'=>$user->adress,
        ':email'=>$user->email,
        ':pwd'=>$user->password,
        )
    );
    return $state;
  }
  return false;
  }
  public  static function update($email,$user)
  {
    $statement = DB::connect()->prepare("UPDATE USERS SET firstName=:firstName,lastName=:lastName,adress=:adress  WHERE email=:email");
    $state=$statement->execute(array(':email'=>$email,':firstName'=>$user->firstName,':lastName'=>$user->lastName,':adress'=>$user->adress));
    return $state;
  }
  public  static function delete($id)
  {
    $statement = DB::connect()->prepare("DELETE  FROM USERS WHERE id=:userId");
    $statement->bindParam(":userId",$id,PDO::PARAM_INT);
    $statement->execute();
    return $statement;
  }
}
