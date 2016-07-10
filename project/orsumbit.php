<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			我的订单
		</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?
		if (!isset($_SESSION['name'])) {
		echo("<script>alert('请先登录');location.href='index.html';</script>");
		} else {
		include "config.php";
		$username=$_SESSION['name'];
		$sql="select * from buyer as b,orders as o,goods as g where b.uname='$username' and b.id = o.ouid and o.ogid = g.gid";
		$oresult=mysql_query($sql);
		$list=mysql_query($sql);
		$otherlist=mysql_fetch_row($list);
		$sql2="select * from buyer as b,re_address as r where b.uname='$username' and b.id = r.auid";
		$result2=mysql_query($sql2);
		$buysoon_gid=$_GET['buysoon_gid'];
		$_SESSION['buysoon']=$_GET['buysoon_gid'];
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
		<form method="post" action="repay.php">
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
				<div class="choose_address">
					<??>
					<a href='select.php' >
						选择收货地址
					</a>
					<br>
					<br>
					<div class="confirm_address">
						<div class="confirm_in">
							<?
							while ($relist2 = mysql_fetch_array($result2)) {
								foreach ($_POST as $keys => $values) {
									if ($relist2['aid'] == $keys) {										
										echo $relist2['arname'] . "收";
										echo "<input type='text' hidden name='arname' value='$relist2[arname]'>";
										$msglist = "<br><br><hr class='chr'><br><input type='text' value='" . $relist2['araddress'] . "' disabled><input type='text' name='address' value='" . $relist2['araddress'] . "' hidden><br><br><input type='text' value='" . $relist2['arphone'] . "' disabled><input type='text' name='arphone' value='" . $relist2['arphone'] . "' hidden>";
										echo $msglist;
									}
								}
							}
							?>
							<br>
							<br>
							<br>
							<a href="osumbit.php">
								<input type="button" value="+新增收货地址" id="buttom01">
							</a>
						</div>
					</div>
				</div>
			
				<div class="confirm02">
					<p>
						<h2>
							确认商品信息
						</h2>
					</p>
					<br>
					<table>
						<tr>
							<th>
								商品信息
							</th>
							<th>
								商品单价
							</th>
							<th>
								商品数量
							</th>
							<th>
								商品总额
							</th>
						</tr>
						
						<?
						while ($orlist = mysql_fetch_array($oresult)) {
							foreach ($_GET as $key => $value) {
								if ($orlist['oid'] == $key) {
									$sql5 = "update orders set buy=1 where oid=$orlist[oid]";
									$result5 = mysql_query($sql5);
								}
							}
							if ($orlist['buy'] == 1) {
							
								$trlist="<input type='gid' name='orders[]' value='$orlist[oid]' hidden>";
								$trlist.= "<tr><td>" . $orlist['gname'] . "</td><td>" . $orlist['gprice'] . "</td><td>" . $orlist['ogcount'] . "</td><td>" . $orlist['ogmoney'] . "</td></tr>";
								echo $trlist;
								$mtotal += $orlist['ogmoney'];
								$send += $orlist['gsend'];
							}
						}
						if (isset($_GET['buysoon_gid'])) {			
								$sql4 = "select * from buyer where uname='$username'";
								$oresult7 = mysql_query($sql4);
								$relist4 = mysql_fetch_array($oresult7);
								$sql3 = "select * from buy_soon as buy,goods as g where buy.buygid=$_GET[buysoon_gid] and buy.buyuid=$relist4[id] and buy.buygid=g.gid";
								$result3 = mysql_query($sql3);
								while ($relist3 = mysql_fetch_array($result3)) {									
									$trlist="<input type='gid' name='item[]' value='$relist3[bid]' hidden>";
									$trlist.= "<tr><td>" . $relist3['gname'] . "</td><td>" . $relist3['gprice'] . "</td><td>" . $relist3['buycount'] . "</td><td>" . $relist3['buytotal'] . "</td></tr>";
									echo $trlist;
									$mtotal += $relist3['buytotal'];
									$send += $relist3['gsend'];
								}
							
						}
						?>
						<tr class="null">
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
						</tr>
					</table>
					<div class="succe">
						<div class="sright">
							<div class="srow">
								<label>商品总额：</label>
								<input type="text" value="<?echo $mtotal?>" disabled>
								<input type="text" name="mtotal" value="<?echo $mtotal?>" hidden>
							</div>
							<div class="srow">
								<label>运&emsp;&emsp;费：</label>
								<input type="text"   value="<?echo $send?>" disabled>
								<input type="text"  name="send" value="<?echo $send?>"hidden>
							</div>
							<div class="srow">
								<label>应付金额：</label>
								<input type="text"   value="<?echo $mtotal+$send?>" disabled>
								<input type="text"  name="total" value="<?echo $mtotal+$send?>" hidden>
							</div>
							<div class="srow">
								<a href="goodbuy.php">
									返回购物车
								</a>&emsp;
								
									<input type="submit" value="提交订单" name="resub">
								
							</div>
						</div>
					</div>
					
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
mysql_close($conn);
}
?>