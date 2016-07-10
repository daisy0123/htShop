<script type="text/javascript" src="js/jquery.js" >
</script>
<?php
session_start();
$online_user=$_SESSION['name'];
$type=$_GET['type'];
if($online_user){
include "config.php";
	$sql5 = "update orders set buy=0 ";
		$result5 = mysql_query($sql5);
		$sql6 = "delete from buy_soon ";
		$result6 = mysql_query($sql6);
$sql="select * from buyer where uname='$online_user'";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
if($type=='账号资料'){
?>
<div class="zl">
	<form enctype="multipart/form-data" action="update.php" method="post" >	
		<div class="upmsg">
			<label for="upname">用户名</label>
			<input type="text" name="upname" id="upname" maxlength="20" value="<? echo $rs['uname']; ?>" disabled/>
		</div>
		<div class="upmsg">
			<label>性别</label>
			<?
			if ($rs['usex'] == '男') {
				echo("<input type='radio' value='男' name='upsex' checked/>
男
<input type='radio' value='女' name='upsex'/>
女");
			} else {
				echo("<input type='radio' value='男' name='upsex' />
男
<input type='radio' value='女' name='upsex' checked/>
女");
			}
			?>
		</div>
		<div class="upmsg">
			<label for="upphone">手机</label>
			<input type="text" name="upphone" id="upphone" placeholder="输入11位有效数字" maxlength="11" value="<? echo $rs['uphone']; ?>"/>
		</div>
		
		<div class="upmsg">
			<label for="upemail">邮箱</label>
			<input type="text" name="upemail" id="upemail" value="<? echo $rs['uemail']; ?>"/>
		</div>
		<div class="upmsg">
			<label for="upaddress">地址</label>
			<input type="text" name="upaddress" id="upaddress" value="<? echo $rs['uaddress']; ?>"/>
		</div>
	
		<div class="upmsg usub">
			<input type="submit" value="确认" name="upsub"/>
		</div>
	</form>


</div>
<?
}
if($type=='我的关注'){
$sql1="select * from ulove as l,goods as g,saler as s where l.lgid=gid and g.sid=s.id and l.uid=$rs[id]";
$result1=mysql_query($sql1);
$recount = mysql_num_rows($result1);
?>
<div class="gz">
	<div class="gztitle">
		<p>
			共有<?echo $recount?>条记录
		</p>
	</div>
	<div class="gzlist">
		<table>
			<tr class="ttitle">
				<th class="goodsname">
					商品名称
				</th>
				<th>
					商品分类
				</th>
				<th>
					商品价格
				</th>
				<th>
					店铺名称
				</th>
				<th>
					详细信息
				</th>
			</tr>
			<?
			while ($relist=mysql_fetch_array($result1)) {
				$lovelist = "<tr><td>".$relist['gname']."</td><td>".$relist['gtype']."</td><td>".$relist['gprice']."</td><td>".$relist['sname']."</td><td><a href='items.php?id=".$relist['gid']."'>详细信息</a></td></tr>";
			echo $lovelist;
			}
			?>
		</table>
	</div>
</div>
<?
}
if($type=='我的订单'){
$sql2="select * from business where buid=$rs[id]";
$result2=mysql_query($sql2);
$recount2= mysql_num_rows($result2);
$relist2=mysql_fetch_array($result2);
?>
<div class="gz">
	<div class="gztitle">
		<p>
			共有<?echo $recount2;?>条记录
		</p>
	</div>
	<div class="gzlist">
		<table>
			<tr class="ttitle">
				<th class="goodsname">
					商品名称
				</th>
				<th>
					商品数量
				</th>
				<th>
					商品总额
				</th>
				<th>
					商家信息
				</th>
				<th>
					收货人
				</th>
			</tr>
			<?
			$sql7="select * from business as buy,goods as g,re_address as r,saler as s where buy.bgid=g.gid and buy.breid=r.aid and buy.buid=$rs[id] and g.sid=s.id";
			$result7=mysql_query($sql7);			
				while($relist7=mysql_fetch_array($result7)){
					$blist="<tr><td>".$relist7['gname']."</td><td>".$relist7['bgcount']."</td><td>".$relist7['btotal']."</td><td>".$relist7['sname']."</td><td>".$relist7['arname']."</td></tr>";
					echo $blist;
				}
			?>
		
		</table>
	</div>
</div>
<?
}
mysql_close($conn);
}
echo "<script>
$(function(){
$('.$type').addClass('mactive');
$('.no').removeClass('mactive');
});
</script>";
?>
