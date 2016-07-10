<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			可乐购商品
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
			<div class="sImg sgoods">
				<?
				include "glist.php";
				?>
			
				</ul>				
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
