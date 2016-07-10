<?session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			选择收货地址
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?
if (!isset($_SESSION['name'])) {
echo("<script>alert('请先登录');location.href='index.html';</script>");
} else {
		$name=$_SESSION['name'];
		$buysoon=$_SESSION['buysoon'];
	
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
					echo "<script>alert('添加成功！');</script>";
					echo " <meta http-equiv=\"refresh\" content=\"0; url=select.php\" />";
				}else{
					echo "<script>alert('添加失败！');</script>";
				}
			}else{
				echo "<script>alert('你没有填完信息！');location.href='osumbit.php';</script>";
			}

		}
		?>
		<div class="ih">
			<div class="ih_right">
				<div class="myList">
					<a href="index.php">
						商场
					</a>
					<a href="goodbuy.php">
						购物车
					</a>
					<a href="buyer.php?type=账号资料">
						个人中心
					</a>&emsp;&emsp;
				</div>
				<div class='online'>
					<?
					echo "<p>在线用户：<a href='#'>" . $_SESSION['name'];
					echo "  </a> <a class='lred' href='logout.php'>  [退出] </a>";
					echo "</p>";
					?>
				</div>
			</div>
		</div>
		<div class="main02">
			<div class="main_in">
				<p class="ap">选择收货地址</p>
	<?
			if(!$buysoon){
		    echo "<form action='orsumbit.php' method='post'>";
		}else{
			 echo "<form action='orsumbit.php?buysoon_gid=$buysoon' method='post'>";
		}
	?>			
		
				<table>
					<tr>
						<th class="th01">选择</th>
						<th class="th02">收货人姓名</th>
						<th class="th03">收货人详细地址</th>
						<th class="th04">收货人号码</th>
						<th class="th05">收货人邮政编码</th>
					</tr>
					<?	
						include "config.php";					
						$sql="select * from buyer as b,re_address as r where b.uname='$name' and b.id=r.auid";
						$result=mysql_query($sql);
						$rcount=mysql_num_rows($result);
						if($rcount==0){
							echo "你没有添加收货地址";
						}else{
							while($relist=mysql_fetch_array($result)){
							$list="<tr><td><input type='checkbox' name='$relist[aid]' ></td><td>".$relist['arname']."</td><td>".$relist['araddress']."</td><td>".$relist['arphone']."</td><td>".$relist['arynum']."</td></tr>";
							echo $list;
						}
						}

					?>
				</table>
				<input type="submit" value="确认" />
				</form>
			</div>
		</div>
		<div class="footer">
			<p>
				&copy;copyright 丘玉秀(20141002345) 
			</p>
		</div>
	</body>
</html>
<?
mysql_close($conn);
}
?>
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?
if(isset($_POST['adsub'])){
	$adname=$_POST['adname'];
	$adaddress=$_POST['adaddress'];
	$adphone=$_POST['adphone'];
	$adnum=$_POST['adnum'];
	$name=$_SESSION['name'];
	include"config.php";
	$sql="select * from buyer where uname='$name'";
	$result=mysql_query($sql);
	$relist=mysql_num_rows($result);
	echo $relist['id'];
	if($adname!=""&&$adaddress!=""&&$adphone!=""&&$adnum!=""){
	
	
	}else{
		echo ("<script>alert('你没有填完整信息');</script>");
	}
	mysql_close();
}
?>