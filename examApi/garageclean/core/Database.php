<?php


class Database
{
/**
 * 
 * Effectue la connexion avec la base de données
 * @return PDO 
 */

 public static function getPdo():PDO{
    $pdo = new PDO("mysql:host=localhost;dbname=testy", 'testy', 'zakizako',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

]);

return $pdo;
}
}





?>