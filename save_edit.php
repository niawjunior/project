<html>
	<head>
	</head>
	<body>
		<?
		require_once("connect.php");
		$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
		$objQuery = mysqli_query($connect,"UPDATE data SET h1 = '".$_POST["txth1"]."',h2 = '".$_POST["txth2"]."',la = '".$_POST["txtla"]."',lo = '".$_POST["txtlo"]."'WHERE ID = 1 ");
		mysqli_close($connect);
		header("Location: edit.php");
		?>
	</body>
</html>