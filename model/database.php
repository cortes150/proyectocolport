<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=colport;charset=utf8', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

//http://192.168.1.38/phpmyadmin/db_structure.php?server=1&db=colport&token=b23d15028fbeecb99150b6043abccfeb