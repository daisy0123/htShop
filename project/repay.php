<?session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			支付商品
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?
if (!isset($_SESSION['name'])) {
echo("<script>alert('请先登录');location.href='index.html';</script>");
} else {
	$username=$_SESSION['name'];
	$arname=$_POST['arname'];
	$araddress=$_POST['address'];
	$arphone=$_POST['arphone'];
	$mtotal=$_POST['mtotal'];
	$send=$_POST['send'];
	$total=$_POST['total'];
		
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
					echo "<p>在线用户：<a href='buyer.php?type=账号资料'>" . $username;
					echo "  </a> <a class='lred' href='logout.php'>  [退出] </a>";
					echo "</p>";
					?>
				</div>
			</div>
		</div>
		<div class="main01">
			<div class="shop_content02">
				<div class="shop_content_img01">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="img/dot.2.png">
					<img src="img/line.jpg">
					<img src="img/dot.2.png">
					<img src="img/line.jpg">
					<img src="img/icon_cir.png">
				</div>
				<div class=" xia">
					<ul class="shop_list">
						<li>
							我的购物车
						</li>
						<li>
							提交订单
						</li>
						<li>
							<p>选择支付方式</p>
						</li>
					</ul>
				</div>
				<div class="order_success">
					<div class="order_success_img">
						<img src="img/check.png">
					</div>
					<span class="span01"><strong>订单提交成功，现在只差最后一步啦！</strong></span>
					<span class="span02"><strong>请选择付款方式，支付成功仓库将尽快为您发货</strong></span>
				</div>
			</div>
			<div class="shop_content03">
				<div class="shop_content03_center">
					<span>支付金额：</span>
					<input type="text" value="<?echo $total;?>">
					<br>
					<br>
					<hr>
					<br>
					<br>
					<div class="other_pay">
						其他支付方式正在完善，敬请期待...
					</div>
					<div class="other_pay_bt">
						<form method="post" action="operation.php">
							
							<input type="text" name='arname' value='<?echo $arname;?>' hidden>
							<input type="text" name='araddress' value='<?echo $araddress;?>' hidden>
							<input type="text" name='arphone' value='<?echo $arphone;?>' hidden>
							<input type="text" name='arsend' value='<?echo $send;?>' hidden>
							<input type="text" name='mtotal' value='<?echo $mtotal;?>' hidden>
							<input type="text" name='total' value='<?echo $total;?>' hidden>
							
							<?
								
							if(isset($_POST['orders'])){
								foreach($_POST['orders'] as $orders){
									echo "<input type='text' name='order[]' value='$orders' hidden>";	
								}	
							}
									
														
							?>
							<input id="pay_bt" type="submit" name="psub" value="完成支付">
						</form>
					</div>
				</div>
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
}
?>