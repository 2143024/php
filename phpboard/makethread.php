<?php

function makethread($title){
$dsn = 'mysql:dbname=data;host=localhost';
$user = 'kanrisha';
$password = 'dbkanri';

try{
    $dbh = new PDO($dsn, $user, $password);
	echo('<p>接続に成功しました。</p><br>');
	$sql = 'SELECT title FROM thread';
	$stmt = $dbh->query($sql);
	foreach ($stmt as $value) {
		if ($value == $title){
			$dbh = null;
			die('<p>同名のスレッドが存在しています。</p><br>');
		}
	}
	
	$sql = 'SELECT MAX(threadid) FROM thread';
	$stmt = $dbh->query($sql);
	$ban = $stmt + 1;
	
	$now = getdate();
	$sql = 'INSERT INTO thread (threadid, title, date) 
			VALUES (?,?,?)';
	$stmt = $dbh->prepare($sql);
	$flag = $stmt->execute(array($ban,$title,$now));
	
	if (!$flag){
        print('failed');
		$info = $dbh->errorInfo();
		var_dump($info);
    }else {
    	print('success');
    }
	
$dbh = null;

}catch (PDOException $e){
	echo('<p>failed</p>');
    die($e->getMessage());
}
}
/*$link = mysqli_connect('localhost', 'kanrisha', 'dbkanri');
if (!$link) {
	die('failed'.mysqli_error());
}
//print('<p>connected</p>');

$db_selected = mysqli_select_db( $link , 'data');
if(!$db_selected){
	die('database select failed'.mysql_error());
}
//print('<p>database selected</p>');
mysqli_query($link, 'SET NAMES utf8');

$result = mysqli_query($link, 'CREATE TABLE data.'.$title.' 
(ban int(11),
namae char(64),
nitiji datetime,
m_address varchar(64),
honbun text)');
if (!$result){
	die('query failed'.mysqli_error($link));
}

//require('C:\xampp\htdocs\phpboard\insert.php');

$close_flag = mysqli_close($link);
//if ($close_flag){
//	print('<p>database closed');
//}
}*/