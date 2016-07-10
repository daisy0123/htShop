<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<?php
		if ($_POST['rsubb'] == '买家注册') {
			$uemail = $_POST['em'];
			$buyer = $_POST['ename'];
			$passward = $_POST['epsd'];
			$sex = $_POST['esex'];
			$uaddress=$_POST['eaddress'];
			if (($uemail != "") && ($buyer != "") && ($passward != "") && ($sex != "")&&($uaddress!="")) {
				require_once "config.php";	
				$sql1="select * from buyer where uname='$buyer'";
				$result1=mysql_query($sql1);
				$recount1=mysql_num_rows($result1);			
				if($recount1==0){
					$sql = "insert into buyer set uname='$buyer',uemail='$uemail',usex='$sex',upsd='$passward',uaddress='$uaddress'";			
					$result = mysql_query($sql);
				}else{
					echo("<script>alert('该用户名已经存在！');</script>");
				}
				
				mysql_close($conn);
				if (!$result) {
					echo("<script>alert('注册失败！');</script>");
				  echo " <meta http-equiv=\"refresh\" content=\"0; url=register.html\" />";
				} else {
					echo("<script>alert('注册成功！请登录');</script>");
					echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
				}
			}
		} else if($_POST['rsubb'] == '商家注册'){
			$semail = $_POST['em'];
			$saler = $_POST['ename'];
			$passward = $_POST['epsd'];
			$sex = $_POST['esex'];
			$saddress=$_POST['eaddress'];
		
			if (($semail != "") && ($saler != "") && ($passward != "") && ($sex != "")&&($saddress!="")) {
				require_once "config.php";	
				$sql2="select * from saler where uname='$saler'";
				$result2=mysql_query($sql2);
				$recount2=mysql_num_rows($result2);			
				if($recount2==0){
				$sql = "insert into saler set sname='$saler',semail='$semail',ssex='$sex',spsd='$passward',saddress='$saddress'";			
				$result = mysql_query($sql);
				}else{
					echo("<script>alert('该用户名已经存在！');</script>");
				}
					
				
				mysql_close($conn);
				if (!$result) {
					echo("<script>alert('sql语句错误！');</script>");
				 echo " <meta http-equiv=\"refresh\" content=\"0; url=register.html\" />";
				} else {
					echo("<script>alert('注册成功！请登录');</script>");
					echo " <meta http-equiv=\"refresh\" content=\"0; url=index.html\" />";
				}
			}
		}
	?>
	</body>
</html>