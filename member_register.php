<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Insert title here</title>
<script type="text/javascript">
	function check() {
		var memName = document.member_form.memName.value;
		var memMail = document.member_form.memMail.value;
		var comName = document.member_form.comName.value;
		var errText1 = errText2 = errText3 = "";
		var chk1 = /^.{1,20}$/;
		var chk2 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		var chk3 = /^.{1,30}$/;
		var rsk1 = chk1.test(memName);
		var rsk2 = chk2.test(memMail);
		var rsk3 = chk3.test(comName);
		var rsk = true;
		if (rsk1==false){
			errText1 = "氏名は全角20文字以内で必ず入力してください。\n";
			rsk=false;
		}
		if (rsk2==false){
			errText2 = "メールアドレスの形式が不正です。\n";
			rsk=false;
		}
		if (rsk3==false){
			errText3 = "会社名は全角30文字以内で必ず入力してください。";
			rsk=false;
		}
		if (rsk==false){
			alert(errText1+errText2+errText3);
			return false;
		}
	}
</script>
<style type="text/css">
	* {
		margin: 3px;
		padding: 5px;
	}
</style>
</head>
<body>
<?php
$page = $_SERVER ["HTTP_REFERER"];
$page = str_replace ( 'http://localhost/kadai/member_', '', $page );
if ($page == "change.php") {
	$db_host = "localhost";
	$db_user = "root";
	$db_passwd = "";
	$db_name = "kadai";
	$conn = mysqli_connect ( $db_host, $db_user, $db_passwd, $db_name );
	mysqli_set_charset($conn, 'utf8');
	if (! $conn) {
		echo "データベース接続エラー：" . mysqli_connect_error ();
	} else {
		$sql = "select * from `membermst` where `memId` = '" . $_POST ["memId"] . "';";
		$result = mysqli_query ( $conn, $sql );
		$row = mysqli_fetch_assoc ( $result );
		if ($row ["memId"] == null) {
			mysqli_close ( $conn );
			echo "<script>window.alert('検索の結果がありません。');</script>";
			echo "<script>document.location.href='member_change.php';</script>";
		}
		mysqli_close ( $conn );
	}
}

?>
	<FORM name="member_form" action=member_update.php method=POST
		onsubmit="return check();">
		<INPUT name=memId type=hidden
			value="<?php if ($page=="change.php") {echo $row ["memId"];}?>">
		<table border="0">
			<tr>
				<td>氏名</td>
				<td><INPUT name=memName type=text size="50"
					value="<?php if ($page=="change.php") {echo $row ["memName"];}?>"></td>
			</tr>
			<tr>
				<td>メールアドレス</td>
				<td><INPUT name=memMail type=text size="50"
					value="<?php if ($page=="change.php") {echo $row ["memMail"];}?>"></td>
			</tr>
			<tr>
				<td>会社名</td>
				<td><INPUT name=comName type=text size="50"
					value="<?php if ($page=="change.php") {echo $row ["comName"];}?>"></td>
			</tr>
			<tr>
				<td colspan="2"><center><input type="submit" value="登録" /></center></td>
			</tr>
		</table>
	</FORM>
</body>
</html>