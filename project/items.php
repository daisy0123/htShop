<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			商品详情
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="ih">
			<div class="ih_right">
				<div class="myList">
					<a href="index.php">
						商场
					</a>
					<?
					if (!isset($_SESSION['name'])) {
						echo("<a href='goodbuy.php' >购物车</a><a href='buyer.php'>个人中心</a>");
					} else {
						echo("<a href='goodbuy.php' >购物车</a><a href='buyer.php?type=账号资料'>个人中心</a>&emsp;&emsp;");
					}
					?>
				</div>
				<div class='online'>
					<?
					if (!isset($_SESSION['name'])) {
						echo("&emsp;&emsp;<a href='index.html'>登陆</a>&nbsp;|&nbsp;<a href='register.html'>注册</a>&emsp;&emsp;");
					} else {
						echo "<p>在线用户：<a href='buyer.php?type=账号资料'>" . $_SESSION['name'];
						echo "  </a> <a class='lred' href='logout.php'>  [退出] </a>";
						echo "</p>";
					}
					?>
				</div>
			</div>
		</div>
		<div class="scon ">
			<div class="content_top ">
				<div class="content_top_center">
					<div class="content_top_center_up">
						<div class="cenImg">
							<img src="img/icon.png" />
						</div>
						<form method="post" action="operation.php">
							<input type="text" placeholder="请输入产品关键字" class="search01" name="gsearname">
							<input type="submit" value="搜索" class="submit01" name="search">
						</form>
					</div>
					<div class="content_top_center_down">
						<div class="navigation">
							<ul>
								<li>
									<a href="goods.php?gtype=护肤">
										护肤
									</a>
								</li>
								<li>
									<a href="goods.php?gtype=卸妆" >
										卸妆
									</a>
								</li>
								<li>
									<a href="goods.php?gtype=彩妆" >
										彩妆
									</a>
								</li>
								<li>
									<a href="goods.php?gtype=身体">
										身体
									</a>
								</li>
								<li>
									<a href="goods.php?gtype=头发">
										头发
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sitem">
				<div class="good_center">
					<div class="center_center">
						<?
						include "config.php";
						$goodsid = $_GET['id'];
						$sql1 = "select * from goods where gid=$goodsid";
						$result1 = mysql_query($sql1);
						$relist1 = mysql_fetch_array($result1);
						$sql5 = "update orders set buy=0 ";
						$result5 = mysql_query($sql5);
						$sql6 = "delete from buy_soon ";
						$result6 = mysql_query($sql6);
						?>
						<div class="good_img">
							<img src="<?echo $relist1['gimg'];?>">
						</div>
						<input type="text" value="<? echo $relist1['gname'] . '&emsp;' . $relist1['gmsg'] . '&emsp;' . $relist1['gintro']; ?>" class="good_name">
						<div class="good_intro">
							<ul>
								<li>
									价格:
								</li>
								<li>
									数量
								</li>
								<li>
									运费
								</li>
								<li>
									税费
								</li>
							</ul>
							<form method='post' action='addgoods.php'>
								<input type="text" value="<?echo $relist1['gid']?>" name="gid" hidden>
								<input type="text" value="￥<?echo $relist1['gprice']?>元" class="price">
								<input type="button" value="-" class="oper" id="less">
								<input type="text" value="1" class="count" name="count" id="gcount">
								<input type="button" value="+" class="oper opera" id="more">
								<input type="text" value="￥<?echo $relist1['gsend']?>元" class="yunfei" name="send">
								<input type="text" value="【本商品包税】  无需额外交税" class="shuifei">
						</div>
		
							<input class="buy_good" type="submit" value="立即购买" name="add">
						
						<input class="add_cart" type="submit" name="add" value="加入购物车">
						</form>
					</div>
					<div class="daohang">
						<p>商品详情</p>			
					</div>
					<div class="detail_msg">					
							<img src="<?echo $relist1['gimg01']?>">						
							<img src="<?echo $relist1['gimg02']?>">						
							<img src="<?echo $relist1['gimg03']?>">						
							<img src="<?echo $relist1['gimg04']?>">						
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>
				&copy;copyright 丘玉秀(20141002345) 
			</p>
		</div>
		<script type="text/javascript" src="js/jquery.js" >
		</script>
		<script type="text/javascript" src="js/register.js" >
		</script>
	</body>
</html>
<?
mysql_close($conn);
?>