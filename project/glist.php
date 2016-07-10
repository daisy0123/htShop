<meta charset="UTF-8">
<link rel="stylesheet" href="css/reset.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<div class="sTilte">
	<span><?echo $_GET['gtype'] ?>系列商品</span>
</div>
<div class="glist">
	<ul>
		<?php
		$gtype = $_GET['gtype'];
		include 'config.php';
		$sql = "select * from goods where gtype='$gtype'and gnow=0";
		$result = mysql_query($sql);
		$result1 = mysql_query($sql);
		$other = mysql_fetch_array($result1);
		$count = mysql_num_rows($result);

		$sql5 = "update orders set buy=0 ";
		$result5 = mysql_query($sql5);
		$sql6 = "delete from buy_soon ";
		$result6 = mysql_query($sql6);
		$list = "";

		if ($count == 0) {
			echo("暂时没有此类商品！");
		} else {
			$sid = $other['sid'];
			$sql1 = "select * from saler where id=$sid";
			$result2 = mysql_query($sql1);
			$relist2 = mysql_fetch_array($result2);
			while ($goods = mysql_fetch_array($result)) {
				$list .= "<li><div class='gImg'><img src='$goods[gimg]' /></div>";
				$list .= "<div class='gword'><a class='gname' href='items.php?id=$goods[gid]'>" . $goods['gname'] . $goods['gintro'];
				$list .= "</a><p class='gprice'><b class='gmsg'>¥" . $goods['gprice'] . "</b>&nbsp;";
				$list .= "</p><p>运费:" . $goods['gsend'] . "元</p><p>店铺:" . $relist2['sname'] . "</p><span><a href='items.php?id=$goods[gid]'>点击购买</a></span></div></li>";
			}
			echo $list;
		}
		mysql_close($conn);
		?>
