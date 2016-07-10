<?php
	session_start();
	
?>

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>可乐购商场</title>
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
					if(!isset($_SESSION['name'])){
						echo("<a href='goodbuy.php' >购物车</a><a href='buyer.php'>个人中心</a>");
						
					}else{
						echo("<a href='goodbuy.php' >购物车</a><a href='buyer.php?type=账号资料'>个人中心</a>&emsp;&emsp;");
					}				
					?>
				</div>
				<div class='online'>
				<?
				if(!isset($_SESSION['name'])){
					echo("&emsp;&emsp;<a href='index.html'>登陆</a>&nbsp;|&nbsp;<a href='register.html'>注册</a>&emsp;&emsp;");
				}else{
					echo "<p>在线用户：<a href='buyer.php?type=账号资料'>" . $_SESSION['name'];
					echo  "  </a> <a class='lred' href='logout.php'>  [退出] </a>";
					echo "</p>";
				}				
				?>
				</div>
			</div>
		</div>
		<?
			include "config.php";
				$sql5 = "update orders set buy=0 ";
		$result5 = mysql_query($sql5);
		$sql6 = "delete from buy_soon ";
		$result6 = mysql_query($sql6);
		mysql_close($conn);
		?>
		<div class="scon">
			<div class="content_top">
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
								<li><a href="goods.php?gtype=护肤" >护肤</a></li>
								<li><a href="goods.php?gtype=卸妆"  >卸妆</a></li>
								<li><a href="goods.php?gtype=彩妆" >彩妆</a></li>
								<li><a href="goods.php?gtype=身体" >身体</a></li>
								<li><a href="goods.php?gtype=头发" >头发</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sImg">
				<div class="sTilte"><span>热门推荐</span></div>
				<div class="showList">
					<ul>
						<li>
							<a href="items.php?id=14">
							<img src="img/canmake棉花糖粉饼.jpg">
							<div class="showI">
								<p class="pBig">【Canmake棉花糖粉饼】</p>
								<p class="pSmall">控油保湿 遮瑕蜜粉 明亮自然珍珠白 10g</p>
								<p class="pSmall">防晒指数 spf26/30</p>
							</div>
							</a>
						</li>
						<li>
							<a href="#">
							<img src="img/marcheur.jpg">
							<div class="showI">
								<p class="pBig">【marcheur修复粉底液】</p>
								<p class="pSmall">cosme高分 平价cpb越油越美丽 </p>
								<p class="pSmall">不泛油光</p>
							</div>
							</a>
						</li>
						<li>
							<a href="#">
							<img src="img/ohbaby.jpg">
							<div class="showI">
								<p class="pBig">【ohbaby蚕丝精华身体磨砂膏 】</p>
								<p class="pSmall">去除角质 滋润保湿 柔嫩肌肤 去黑提亮</p>
								<p class="pSmall">适合所有肤质</p>
							</div>
							</a>
						</li>
						<li>
							<a href="#">
							<img src="img/城野医生水.jpg">
							<div class="showI">
								<p class="pBig">【Dr.Ci:Labo 城野毛孔收缩水】</p>
								<p class="pSmall">控油收毛孔化妆水 Labo </p>
								<p class="pSmall">Labo保湿去角质100ml</p>
							</div>
							</a>
						</li>
						<li>
							<a href="#">
							<img src="img/D_OW(9HKI{)DLH_0)LRII(U.jpg">
							<div class="showI">
								<p class="pBig">【Canmake棉花糖粉饼】</p>
								<p class="pSmall">控油保湿 遮瑕蜜粉 明亮自然珍珠白 10g</p>
								<p class="pSmall">防晒指数 spf26/30</p>
							</div>
							</a>
						</li>
						<li>
							<a href="#">
							<img src="img/too cool 01.png">
							<div class="showI">
								<p class="pBig">【Canmake棉花糖粉饼】</p>
								<p class="pSmall">控油保湿 遮瑕蜜粉 明亮自然珍珠白 10g</p>
								<p class="pSmall">防晒指数 spf26/30</p>
							</div>
							</a>
						</li>
					</ul>
				</div>
			</div>

		</div>
		
    	<div class="footer">
			<p>&copy;copyright 丘玉秀(20141002345) </p>
		</div>
   
	</body>

</html>

