<?php

namespace Db;

use \PDO;

class DB
{

    private static $user = "root";
    private static $dsn = "mysql:host=localhost;dbname=gestion-posts";
    private static $password = "";
    private static $cnx = null;

    public function __construct($dbname = 'gestion-posts', $host = 'localhost', $driver = 'mysql', $user = 'root', $password = '')
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
