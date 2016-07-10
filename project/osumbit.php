<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			提交订单
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?
if (!isset($_SESSION['name'])) {
echo("<script>alert('请先登录');location.href='index.html';</script>");
} else {
	
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
					echo "<p>在线用户：<a href='buyer.php?type=账号资料'>" . $_SESSION['name'];
					echo "  </a> <a class='lred' href='logout.php'>  [退出] </a>";
					echo "</p>";
					?>
				</div>
			</div>
		</div>
		<div class="main01">
			<div class="shop_content01">
				<div class="shop_content_img01">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="img/dot.2.png">
					<img src="img/line.jpg">
					<img src="img/icon_cir.png">
					<img src="img/line.jpg">
					<img src="img/dot.2.png">
				</div>
				<div class="shop_content_list01">
					<ul class="shop_list">
						<li>
							我的购物车
						</li>
						<li>
							<p>
								提交订单
							</p>
						</li>
						<li>
							选择支付方式
						</li>
					</ul>
				</div>
				<div class="address">
					<p class="ap">
						新增收货地址
					</p>
					<hr class="ahr">
					<div class="address_list">
						<form method="post" action="select.php">
							<div class="arow">
								<label>*收货人姓名：</label>
								<input type="text" name="adname"  placeholder="必须填写真实姓名">
							</div>
							<div class="arow">
								<label>*收货人地址：</label>
								<input type="text" name="adaddress" placeholder="必须填写真实地址">
							</div>
							<div class="arow">
								<label>*收货人号码：</label>
								<input type="text"name="adphone" placeholder="必须填写11位数字" maxlength="11">
							</div>
							<div class="arow">
								<label>&emsp;*邮政编码：</label>
								<input type="text" name="adnum"  placeholder="填写有效的邮政编码">
							</div>
							<div class="arow asub">							
								<input type="submit"  name="adsub" value="添加收货地址">
							</div>
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
