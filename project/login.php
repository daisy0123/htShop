<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if ($_POST['submit'] == '买家登陆') {
	$uname = $_POST['username'];
	$pass = $_POST['psd'];
	if (($uname != "") && ($pass != "")) {
		require_once "config.php";
		$sql = "select * from buyer where uname='$uname' and upsd='$pass'";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		if ($count == 0) {
			echo "<script>alert('用户名或者密码错误！');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
		} else {
			echo "<script>alert('登陆成功！');</script>";
			$_SESSION['name']=$uname;
			echo " <meta http-equiv=\"refresh\" content=\"0; url=index.php\" />";
		}
		mysql_close($conn);
	} else {
		echo "<script>alert('用户名或者密码错误！');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
	}
} else if ($_POST['submit'] == '商家登陆') {
	$sname = $_POST['username'];
	$spass = $_POST['psd'];
	if (($sname != "") && ($spass != "")) {
		require_once "config.php";
		$sql = "select * from saler where sname='$sname' and spsd='$spass'";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		if ($count == 0) {
			echo "<script>alert('用户名或者密码错误！');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
		} else {
			echo "<script>alert('登陆成功！');</script>";
			$_SESSION['name']=$sname;
			echo " <meta http-equiv=\"refresh\" content=\"0; url=saler.php?type=账号资料\" />";
		}
		mysql_close($conn);
	} else {
		echo "<script>alert('用户名或者密码错误！');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
	}
}
?>
