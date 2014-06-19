<?php

error_reporting(E_ALL & ~E_DEPRECATED);

$dsn = 'mysql:dbname=data;host=localhost';
$user = 'kanrisha';
$password = 'dbkanri';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');


}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;
