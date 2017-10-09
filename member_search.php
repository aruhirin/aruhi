<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Insert title here</title>
<script type="text/javascript">
	function check() {
		var id = document.change_form.memId.value;
		var chk = /^[0-9]{4}$/;
		var rsk = chk.test(id);
		if (rsk==false){
				alert("IDは数字4桁のみ入力してください。");
				document.getElementById('search').style.borderStyle='solid';
				document.getElementById('search').style.borderColor='red';
				document.getElementById('search').style.backgroundColor='yellow';
				document.getElementById('search').style.color='red';
				document.change_form.memId.focus();
				return false;
		}
	}
</script>
<style type="text/css">
#search {
	line-height: 60px;
}
</style>
</head>
<body>
	<span id="search">IDを入力してください。</span>
	<form name="change_form" method="POST" action="member_data.php"
		onsubmit="return check();">
		ID : <input type="text" name="memId" size="10" /> <input
			type="submit" value="検索" />
	</form>
</body>
</html>