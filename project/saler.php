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
					
				<div class='online'>
				<?
				
					echo "<p>在线用户：<a href='saler.php?type=账号资料'>" . $_SESSION['name'];
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
								<a href="saler.php?type=账号资料" target="_self">
									账号资料
								</a>
							</li>							
							<li class="我的商品">
								<a href="saler.php?type=我的商品" target="_self">
									我的商品
								</a>
							</li>					
							<li class="发布商品">
								<a href="saler.php?type=发布商品" target="_self">
									发布商品
								</a>
							</li>
							<li class="修改商品">
								<a href="saler.php?type=修改商品" target="_self">
									修改商品
								</a>
							</li>
								<li class="交易订单">
								<a href="saler.php?type=交易订单" target="_self">
									交易订单
								</a>
							</li>
							<li class="关注信息">
								<a href="saler.php?type=关注信息" target="_self">
									关注信息
								</a>
							</li>
						</ul>
					</div>
					<div class="stright">
						<?
						include "smsg.php";
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
