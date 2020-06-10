<?php

namespace Db;

use \PDO;

class DB
{
    
    public static function connect()
    {
        $user="b3c58fb0c75aea";
        $dsn='mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_e930eb01e5fe951';
        $password ="4acfa755";
        $cnx = null;
        
        if (!$cnx) {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $cnx = $pdo;
        }
        return $cnx;
    }
}
