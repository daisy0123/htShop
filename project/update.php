<?session_start();?>
<meta charset="utf-8">
<?
include "config.php";
if(isset($_POST['upsub'])){
	$uname=$_SESSION['name'];
	$upsex=$_POST['upsex'];
	$upphone=$_POST['upphone'];
	$upemail=$_POST['upemail'];
	$upaddress=$_POST['upaddress'];
	$sql="update buyer set uphone='$upphone',usex='$upsex',uaddress='$upaddress',uemail='$upemail' where uname='$uname'";
	$result=mysql_query($sql);
	if($result){
		echo "<script>alert('更改成功！');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=buyer.php?type=账号资料\" />";
	}
}
if(isset($_POST['spsub'])){
	$uname=$_SESSION['name'];
	$upsex=$_POST['upsex'];
	$upphone=$_POST['upphone'];
	$upemail=$_POST['upemail'];
	$upaddress=$_POST['upaddress'];
	$sql="update saler set sphone='$upphone',ssex='$upsex',saddress='$upaddress',semail='$upemail' where sname='$uname'";
	$result=mysql_query($sql);
	if($result){
		echo "<script>alert('更改成功！');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=saler.php?type=账号资料\" />";
	}
}

mysql_close($conn);
	

?>