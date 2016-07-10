
<meta charset="utf-8" />
<?
		include "config.php";	
		if(isset($_POST['adsub'])){
			$adname=$_POST['adname'];
			$adaddress=$_POST['adaddress'];
			$adphone=$_POST['adphone'];
			$adnum=$_POST['adnum'];
			if($adname!="" && $adaddress!=""&& $adnum!=""&& $adphone!=""){
				$sql1="select id from buyer where uname='$name'";
				$result1=mysql_query($sql1);
				$relist1=mysql_fetch_array($result1);
				$sql2="insert into re_address set auid='$relist1[id]',araddress='$adaddress',arname='$adname',arphone='$adphone',arynum='$adnum'";
				$result2=mysql_query($sql2);
				if($result2){
					echo "<script>alert('添加成功！');location.href='select.php';</script>";
				}else{
					echo "<script>alert('添加失败！');</script>";
				}
			}else{
				echo "<script>alert('你没有填完信息！');location.href='osumbit.php';</script>";
			}

		}
		mysql_close($conn);
?>