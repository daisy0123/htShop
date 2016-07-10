<?
session_start();
?>
<meta charset="utf-8">
<?
include "config.php";
$orderid = $_GET['orderid'];
$username = $_SESSION['name'];
if ($_GET['type'] == delete) {
	$sql = "delete from orders where oid=$orderid";
	$result = mysql_query($sql);
	if ($result) {
		echo("<script>alert('删除订单成功');</script>");
		echo " <meta http-equiv=\"refresh\" content=\"0; url=goodbuy.php\" />";
	} else {
		echo("<script>alert('删除订单失败');</script>");
	}
} else if ($_GET['type'] == add) {
	$sql1 = "select * from orders as o,goods as g where oid=$orderid and o.ogid=g.gid";
	$result1 = mysql_query($sql1);
	$relist1 = mysql_fetch_array($result1);
	$lgid = $relist1['ogid'];
	$uid = $relist1['ouid'];
	$sid = $relist1['sid'];
	$sql3 = "select * from ulove where uid=$uid and lgid=$lgid and lsid=$sid";
	$result3 = mysql_query($sql3);
	$recount = mysql_num_rows($result3);
	if ($recount == 0) {
		$sql2 = "insert into ulove set uid=$uid,lgid=$lgid,lsid=$sid";
		$result2 = mysql_query($sql2);
		if ($result2) {
			echo("<script>alert('添加收藏成功');</script>");
			echo " <meta http-equiv=\"refresh\" content=\"0; url=buyer.php?type=我的关注\" />";
		} else {
			echo("<script>alert('添加收藏失败');</script>");
		}
	} else {
			echo("<script>alert('你已经收藏过这个商品了');</script>");
			echo " <meta http-equiv=\"refresh\" content=\"0; url=goodbuy.php\" />";
	}
}
if(isset($_POST['psub'])){
	if($_POST['psub']==完成支付){
		$arname=$_POST['arname'];
		$araddress=$_POST['araddress'];
		$arphone=$_POST['arphone'];					
		$sql4="select * from re_address as r,buyer as b where r.auid=b.id and r.arname='$arname' and b.uname='$username'";	
		$result4=mysql_query($sql4);
		$relist4=mysql_fetch_array($result4);								
		if(isset($_POST['order'])){
			
				$sql7="select * from orders where ouid='$relist4[auid]'";			
				$result7=mysql_query($sql7);
				while($relist7=mysql_fetch_array($result7)){
					foreach($_POST['order'] as $orders){
						if($relist7['oid']==$orders && $relist7['buy']==1){
							$sql8="insert into business set buid='$relist7[ouid]',bgid='$relist7[ogid]',bgcount='$relist7[ogcount]',btotal='$relist7[ogmoney]',breid='$relist4[aid]'";
							$result8=mysql_query($sql8);				
						}
					}	
				}
				if($result8){
					echo "<script>alert('交易成功!');</script>";				
					echo " <meta http-equiv=\"refresh\" content=\"0; url=buyer.php?type=我的订单\" />";
				}
						
		}else{
			$sql5="select * from buy_soon as buy,goods as g where buy.buygid=g.gid and buy.buyuid='$relist4[auid]'";	
			$result5=mysql_query($sql5);
			$relist5=mysql_fetch_array($result5);
			$sql6="insert into business set buid='$relist4[auid]',bgid='$relist5[buygid]',bgcount='$relist5[buycount]',btotal='$relist5[buytotal]',breid='$relist4[aid]'";
			$result6=mysql_query($sql6);
			if($result6){
				echo "<script>alert('交易成功!');</script>";
				echo " <meta http-equiv=\"refresh\" content=\"0; url=buyer.php?type=我的订单\" />";
			}
		}
		
	}
	$sql10 = "update orders set buy=0 ";
	$result10 = mysql_query($sql10);
	$sql11 = "delete from buy_soon ";
	$result11= mysql_query($sql11);
}

if($_GET['type']==dele){
	$degid=$_GET['id'];
	$sql6="update goods set gnow=1 where gid=$degid";
	$result6=mysql_query($sql6);	
	if($result6){
			echo "<script>alert('成功下架商品!');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=saler.php?type=我的商品\" />";
	}
}

if(isset($_POST['gdsub'])){
	$gdname=$_POST['gdname'];
	$gdmsg=$_POST['gdmsg'];
	$gdprice=$_POST['gdprice'];
	$gdintro=$_POST['gdintro'];
	$gdtype=$_POST['gdtype'];
	$gdsend=$_POST['gdsend'];
	$gsid=$_POST['sname'];
	
	$UploadPath = "./upload/";
for ($i = 0; $i < 5; $i++) {   
    if (($_FILES['uploadfile']['tmp_name'][$i] == "") || ($_FILES['uploadfile']['tmp_name'][$i] == NULL)) {
        echo "<script>alert('没有文件或者文件过大！')</script>";
    } else {
       
        $dest_filename = $UploadPath . $_FILES["uploadfile"]["name"][$i];

        if (file_exists($dest_filename)) {
            echo "<script>alert('文件", $_FILES["uploadfile"]["name"][$i], "已经存在')</script>";
        } else {
            copy($_FILES['uploadfile']['tmp_name'][$i], $dest_filename);
           
        }
    }


}
	$picshort=$_FILES["uploadfile"]["name"];
	$picadd00="upload/".$picshort[0];
  	$picadd01="upload/".$picshort[1];
   	$picadd02="upload/".$picshort[2];
  	$picadd03="upload/".$picshort[3];
  	$picadd04="upload/".$picshort[4];
	$sql8="insert into goods set gname='$gdname',gprice='$gdprice',gintro='$gdintro',gtype='$gdtype',gsend='$gdsend',sid='$gsid',gmsg='$gdmsg',gimg='$picadd00'";
	$sql8.=",gimg01='$picadd01',gimg02='$picadd02',gimg03='$picadd03',gimg04='$picadd04'";
	$result8=mysql_query($sql8);
	if($result8){
		echo "<script>alert('成功发布商品!');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=saler.php?type=我的商品\" />";
	}
}
if(isset($_POST['updatesub'])){
	$gdname=$_POST['gdname'];
	$gdmsg=$_POST['gdmsg'];
	$gdprice=$_POST['gdprice'];
	$gdcount=$_POST['gdcount'];
	$gdid=$_POST['gdid'];
	$gdsend=$_POST['gdsend'];
	$sql4="update goods set gname='$gdname',gprice='$gdprice',gintro='$gdcount',gsend='$gdsend',gmsg='$gdmsg' where gid='$gdid'";

	$result4=mysql_query($sql4);

	if($result4){
			echo "<script>alert('修改成功!');</script>";
			echo " <meta http-equiv=\"refresh\" content=\"0; url=saler.php?type=我的商品\" />";
	}
}
if(isset($_POST['search'])){
	$gname=$_POST['gsearname'];
	$sql12="select gid from goods where gname like '%$gname%'";
	$result12=mysql_query($sql12);
	$recount12=mysql_num_rows($result12);
	$relist12=mysql_fetch_array($result12);
	if($recount12==0){
		echo "<script>alert('没有此类商品!');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=index.php\" />";		
	}else{
		echo "<script>alert('查找成功!');</script>";
		echo " <meta http-equiv=\"refresh\" content=\"0; url=items.php?id=$relist12[gid]\" />";
	}
}
mysql_close($conn);
?>