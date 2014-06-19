<?php

function logic($title,$tid){
$dsn = 'mysql:dbname=data;host=localhost';
$user = 'kanrisha';
$password = 'dbkanri';

try{
    $dbh = new PDO($dsn, $user, $password);

$sql = 'SELECT * FROM ? WHERE threadid = ?';
$stmt = $dbh->prepare($sql);
$flag = $stmt->execute($title,$tid);
	
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;
return $result;
}