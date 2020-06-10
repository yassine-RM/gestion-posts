<?php

namespace Db;

use \PDO;

class DB
{
    private static $user="b3c58fb0c75aea";
    private static $dsn='mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_e930eb01e5fe951';
    private static $password ="4acfa755";
    private static $cnx = null;
    public function __construct($dbname = 'heroku_e930eb01e5fe951', $host = 'us-cdbr-east-05.cleardb.net', $driver = 'mysql', $user = 'b3c58fb0c75aea', $password = '4acfa755')
    {
        $this->dsn = $driver . ':host=' . $host . ';dbname=' . $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public static function connect()
    {
        if (!self::$cnx) {
            $pdo = new PDO(self::$dsn, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$cnx = $pdo;
        }
        return self::$cnx;
    }
}
