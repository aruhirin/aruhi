<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Insert title here</title>
<style type="text/css">
* {
	margin: 3px;
	padding: 5px;
}

table, td {
	border: 1px black solid;
	border-collapse: collapse;
}
</style>
</head>
<body> <?php
$memId = $_POST ["memId"];
$db_host = "localhost";
$db_user = "root";
$db_passwd = "";
$db_name = "kadai";
$conn = mysqli_connect ( $db_host, $db_user, $db_passwd, $db_name );
mysqli_set_charset($conn, 'utf8');
if (! $conn) {
	echo "データベース接続エラー：" . mysqli_connect_error ();
} 

else {
	$sql = "select * from `membermst` where `memId` = '" . $memId . "'; ";
	$result = mysqli_query ( $conn, $sql );
	$row = mysqli_fetch_assoc ( $result );
	if ($row ["memId"] == null) {
		mysqli_close ( $conn );
		echo "<script>window.alert('検索の結果がありません。'); </script
	>";
		echo "<script>document.location.href='member_search.php'; </script
	>";
	} 

	else {
		?>
	<table>
		<tr>
			<td>ID</td>
			<td width="300"><?php
		echo $row ["memId"]?></td>
		</tr>
		<tr>
			<td>氏名</td>
			<td width="300"><?php
		echo $row ["memName"]?></td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td width="300"><?php echo $row["memMail"]?></td>
		</tr>
		<tr>
			<td>会社名</td>
			<td width="300"><?php echo $row["comName"]?></td>
		</tr>
	</table>
	<button type="button" onclick="history.back(); ">戻る</button> <?php
		mysqli_close ( $conn );
	}
}
?>
</
body
>
</
html
>
