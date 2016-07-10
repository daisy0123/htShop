<?
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			我的购物车
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js" >
		</script>
		<script type="text/javascript" src="js/register.js" >
		</script>
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
		<?
		include "config.php";
		$username=$_SESSION['name'];
		$sql="select * from buyer as b,orders as o,goods as g where b.uname='$username' and b.id = o.ouid and o.ogid = g.gid";
		$oresult=mysql_query($sql);
		$ocount=mysql_num_rows($oresult);
		$sql5 = "update orders set buy=0 ";
		$result5 = mysql_query($sql5);
		$sql6 = "delete from buy_soon ";
		$result6 = mysql_query($sql6);
		if($ocount==0){
		?>
		<div class="main">
			<div class="shop_content">
				<div class="shop_content_img01">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="img/icon_cir.png">
					<img src="img/line.jpg">
					<img src="img/dot.2.png">
					<img src="img/line.jpg">
					<img src="img/dot.2.png">
				</div>
				<div class="shop_content_list01">
					<ul class="shop_list">
						<li>
							<p>
								我的购物车
							</p>
						</li>
						<li>
							提交订单
						</li>
						<li>
							选择支付方式
						</li>
					</ul>
				</div>
				<div class="shop_content_img02">
					<img src="img/shopping cart.png">
					购物车空空如也，赶紧去
					<a href="index.php">
						逛逛吧>
					</a>
				</div>
			</div>
		</div>
		<?
		}else{
		?>
		<div class="main buy">
			<form action="orsumbit.php" method="get">
				<div class="shop_content shop_buy">
					<div class="shop_content_img01">
						&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="img/icon_cir.png">
						<img src="img/line.jpg">
						<img src="img/dot.2.png">
						<img src="img/line.jpg">
						<img src="img/dot.2.png">
					</div>
					<div class="shop_content_list01">
						<ul class="shop_list">
							<li>
								我的购物车
							</li>
							<li>
								提交订单
							</li>
							<li>
								选择支付方式
							</li>
						</ul>
					</div>
					<div class="olist">
						<table>
							<tr>
								<th class="th1">
									商品信息
								</th>
								<th class="th2">
									单价(元)
								</th>
								<th class="th3">
									数量
								</th>
								<th class="th2">
									金额
								</th>
								<th class="th3">
									操作
								</th>
							</tr>
							<?
							$mtotal = 0;
							while ($orelist = mysql_fetch_array($oresult)) {
								$ogmoney = $orelist['ogcount'] * $orelist['gprice'];
								$sql1 = "update orders set ogmoney=$ogmoney where oid=$orelist[oid]";
								$ordesult = mysql_query($sql1);
								$ortr = "<tr>
							<td class='td1'>
							<input type='checkbox' name='$orelist[oid]' class='check' />
							<img src='$orelist[gimg]'>
							<div class='omsg'>
							<a href='items.php?id=$orelist[gid]'>" . $orelist['gname'];
								$ortr .= "</a></div></td>
							<td class='th2 oprice'><b>" . $orelist['gprice'] . "</b>
							</td><td class='th3'>
							<input type='text' class='ototal' value='$orelist[ogcount]' disabled='true'/>
							</td><td class='th2 tmoney'>
							<b>" . $orelist['ogmoney'] . "</b>
							</td><td class='th3'>
							<a href='operation.php?type=delete&&orderid=$orelist[oid]'>
							删除
							</a>&emsp;
							<a href='operation.php?type=add&&orderid=$orelist[oid]'>
							添加收藏
							</a>
							</td>
							</tr>";
								echo $ortr;
							}
							?>
						</table>
					</div>
					<div class="shop_total">
						<ul>
							<li id="li08">
								<input type="checkbox" class="secheck" id='secheck'/>
							</li>
							<li id="li09">
								全选
							</li>
							<li id="li10">
								&emsp;
								&emsp;&emsp;&emsp;&emsp;
							</li>
							<li id="li11">
								已选商品<b>0</b>件
							</li>
							<li id="li12">
								总价（不含运费）：
								<input class="mtotal" type="text" value="">
							</li>
							<li id="li13">
								<input type="submit" value="结算">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</form>
		</div>
		<?
		}
		mysql_close($conn);
		?>
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