<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>スレッド一覧</title>
	</head>
	<body>
		<p>
		<?php include('C:\xampp\htdocs\phpboard\threadlogic.php');
			$i = 0;
			$num_thread = mysqli_num_rows($thread_list);
			while ($i < $num_thread){
				echo mysql_db_name($db_list , $i)."<br />";
			}
		?>
		</p>
	</body>
</html>