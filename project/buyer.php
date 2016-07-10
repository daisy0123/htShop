<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			个人中心
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
		<div class="scon ">		
			<div class="sImg sbuyer">
				<div class="st">
					<div class="stimg">
						<div class="stimgg">
							<img src="img/男.jpg" />
						</div>
						<div class="stw">
							
						</div>
					</div>
					<div class="stleft">
						<ul>
							<li class="no">
								<b>个人中心</b>
							</li>
							<li class="账号资料 ">
								<a href="buyer.php?type=账号资料" target="_self">
									账号资料
								</a>
							</li>							
							<li class="我的关注">
								<a href="buyer.php?type=我的关注" target="_self">
									我的关注
								</a>
							</li>
							<li class="我的订单">
								<a href="buyer.php?type=我的订单" target="_self">
									我的订单
								</a>
							</li>
						</ul>
					</div>
					<div class="stright">
						<?
						include "umsg.php";
						?>
					</div>
				</div>
			</div >
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
