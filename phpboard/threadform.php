<html>
	<head>
		<meta charset="UTF-8">
		<title>スレッド作成</title>
	</head>
<body>
<form id="x1" name="x1" method="post" action="">
	<table class="form">
		<tbody>
		<tr>
			<td>
				タイトル：<input type="text" id="title" name="title">
			</td>
		</tr>
		<tr>
			<td>
				名前：<input type="text" id="namae" name="namae" value="ななし">
			</td>
		</tr>
		<tr>
			<td>
				メール：<input type="text" id="mail" name="mail">
			</td>
		</tr>
		<tr>
			<td>
				<textarea id="comment" name="comment"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="make" value="作成">
			</td>
		</tr>
		</tbody>
	</table> 
</form>

<?php 
error_reporting(~E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if($_POST['title'] != "" && $_POST['comment'] != ""){
require('C:\xampp\htdocs\phpboard\makethread.php'); //スレッド作成処理
//require 'C:\xampp\htdocs\phpboard\insert.php';　//スレッドの内容書き込み

//echo $php_errormsg;
set_time_limit(0);
makethread($_POST['title']);
$id = 0;
//insert($_POST, $id);
}else {
	echo "<p>タイトルと本文を入力してください</p>";
}}
?>

</body>
</html>