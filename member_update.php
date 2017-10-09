<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Insert title here</title>
</head>
<body>
<?php
$memName = $_POST ["memName"];
$memMail = $_POST ["memMail"];
$comName = $_POST ["comName"];
$db_host = "localhost";
$db_user = "root";
$db_passwd = "";
$db_name = "kadai";
$conn = mysqli_connect ( $db_host, $db_user, $db_passwd, $db_name );
if (! $conn) {
	echo "データベース接続エラー：" . mysqli_connect_error ();
} else {
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
mysqli_query($conn, "set session character_set_server=utf8;");
	if ($_POST ["memId"] == "") {
		$sql = "select MAX(`memId`) from `membermst`";
		$result = mysqli_query ( $conn, $sql );
		$row = mysqli_fetch_assoc ( $result );
		if ($row ["MAX(`memId`)"] == null) {
			$memId = "0000";
		} else {
			$memId = sprintf ( "%04d", $row ["MAX(`memId`)"] + 1 );
		}
		$sql = "insert into membermst values('" . $memId . "', '" . $memName . "', '" . $memMail . "', '" . $comName . "')";
	} else {
		$memId = $_POST ["memId"];
		$sql = "update membermst set `memName`='" . $memName . "', `memMail`='" . $memMail . "', `comName`='" . $comName . "' where memId='" . $memId . "';";
	}
	if (mysqli_query ( $conn, $sql )) {
		mysqli_close ( $conn );
		echo "<script>document.location.href='main_menu.php';</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error ( $conn );
		mysqli_close ( $conn );
	}
}
?>
</body>
</html>