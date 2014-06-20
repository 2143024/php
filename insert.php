<?php

function insert($rows, $id){
$dsn = 'mysql:dbname=data;host=localhost';
$user = 'kanrisha';
$password = 'dbkanri';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');
	
	if(!$rows['title']){
	$ban = 1;
	}	else if($id == 1){
	$ban = '(SELECT MAX(ban) FROM comment WHERE threadid = '.$rows['threadid'].')+1';
	}
	
	$sql = 'INSERT INTO comment 
			(lessban, name, date, email, comment) 
			VALUES (?,?,SELECT getDate(),?,?)';
	$stmt = $dbh->prepare($sql);
	$flag = $stmt->execute(array($ban,$rows['name'],$rows['email'],$rows['comment']));
	
	if ($flag){
        print('success');
    }else{
        print('failed');
    }
	$dbh = null;


}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
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
mysqli_query($link, 'SET NAMES utf8');

if($id == 0){
	$ban = 1;
}else if($id == 1){
	$ban = 'SELECT COUNT(ban) FROM '.$rows['title'];
}

mysqli_query($link,'INSERT INTO '.$rows['title'].
'　(ban, namae, nitiji, m_address, honbun) 
VALUES (1 + '.$ban.',
'.$rows['namae'].',SELECT GETDATE(),'
.$rows['m_address'].','.$rows['honbun'].')');

mysqli_close($link);
}

 $a = array('title' => 'test',
 'ban' => 1,
 'namae' => "nanasi",
 'nitiji' => date('Y'),
 'm_address' => '2143024@stu.hus.ac.jp',
 'honbun' => 'hiho' );

insert($a, 0);*/
}
