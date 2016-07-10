<?session_start(); ?>
<meta charset="utf-8" />
<?
include "config.php";
if(isset($_POST['add'])){
	$username=$_SESSION['name'];
	$goodsids=$_POST['gid'];
	$gcount=$_POST['count'];
	$sql1="select * from buyer where uname='$username'";
		$oresult1=mysql_query($sql1);
		$orlist1=mysql_fetch_array($oresult1);		
		$sql2="select * from goods where gid=$goodsids";
		$oresult2=mysql_query($sql2);
		$orlist2=mysql_fetch_array($oresult2);
		$gtotal=$orlist2['gprice']*$gcount;
	if($_POST['add']==加入购物车){	
		$sql5="select * from orders where ouid='$orlist1[id]' and ogid='$orlist2[gid]'";
		$oresult5=mysql_query($sql5);
		$orcount5=mysql_num_rows($oresult5);
		if($orcount5==0){
			$sql3="insert into orders set ouid='$orlist1[id]',ogid='$orlist2[gid]',ogcount='$gcount'";
			$oresult3=mysql_query($sql3);
			if($oresult3){
				echo "<script>alert('成功加入购物车');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=goodbuy.php\" />";
		}
		}else{
			$sql6="update orders set ogcount=ogcount+$gcount where ouid='$orlist1[id]' and ogid='$orlist2[gid]' ";
			$oresult6=mysql_query($sql6);
			if($oresult6){
				echo "<script>alert('成功加入购物车');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=goodbuy.php\" />";
		}
		}	
	}else if($_POST['add']==立即购买){
		$sql7="select * from buy_soon where buygid=$orlist2[gid] and buyuid='$orlist1[id]' ";
		$oresult7=mysql_query($sql7);
		$orcount7=mysql_num_rows($oresult7);
	   if($orcount7==0){
	   	$sql8="insert into buy_soon set buyuid='$orlist1[id]',buygid='$orlist2[gid]',buycount='$gcount',buytotal='$gtotal'";
			$oresult8=mysql_query($sql8);
			if($oresult8){
	
		echo " <meta http-equiv=\"refresh\" content=\"0; url=orsumbit.php?buysoon_gid=$orlist2[gid]\" />";		
			}
	   }else{
	   	$sql9="update buy_soon set buycount=buycount+$gcount,buytotal=buytotal+$gtotal where buyuid='$orlist1[id]' and buygid='$orlist2[gid]' ";
		$oresult9=mysql_query($sql9);
		if($oresult9){
				
				echo " <meta http-equiv=\"refresh\" content=\"0; url=orsumbit.php?buysoon_gid=$orlist2[gid]\" />";
		
	      }		
	   }
	}
}		
mysql_close($conn);
?>