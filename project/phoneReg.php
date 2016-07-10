<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<?php
		if ($_POST['rsub'] == '买家注册') {
			$phone = $_POST['tele'];
			$buyer = $_POST['uname'];
			$passward = $_POST['rpsd'];
			$sex = $_POST['sex'];
			$uaddress=$_POST['uaddress'];
			if (($phone != "") && ($buyer != "") && ($passward != "") && ($sex != "")&&($uaddress!="")) {
				require_once "config.php";		
				$sql1="select * from buyer where uname='$buyer'";
				$result1=mysql_query($sql1);
				$recount1=mysql_num_rows($result1);			
				if($recount1==0){
					$sql = "insert into buyer set uname='$buyer',uphone='$phone',usex='$sex',upsd='$passward',uaddress='$uaddress'";			
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
		} else if($_POST['rsub'] == '商家注册'){
			$phone = $_POST['tele'];
			$saler = $_POST['uname'];
			$passward = $_POST['rpsd'];
			$sex = $_POST['sex'];
			$saddress=$_POST['uaddress'];
			
			if (($phone != "") && ($saler != "") && ($passward != "") && ($sex != "")&&($saddress!="")) {
				require_once "config.php";	
				$sql2="select * from saler where uname='$saler'";
				$result2=mysql_query($sql2);
				$recount2=mysql_num_rows($result2);			
				if($recount2==0){
				$sql = "insert into saler set sname='$saler',sphone='$phone',ssex='$sex',spsd='$passward',saddress='$saddress'";			
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