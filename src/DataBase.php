<?php
namespace App;
use PDO;

class DataBase{
    public static $pdo;

    public static function getPDO($dbname):PDO
    {
       if (!self::$pdo) {
        self::$pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","iwannabethebest472",[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ
        ]);
       }
       return self::$pdo;
    }


}