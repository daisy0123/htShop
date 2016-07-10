<script type="text/javascript" src="js/jquery.js" >
</script>
<?php
session_start();
$online_user=$_SESSION['name'];
$type=$_GET['type'];
if($online_user){
include "config.php";
$sql="select * from saler where sname='$online_user'";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
if($type=='账号资料'){
?>
<div class="zl">
	<form enctype="multipart/form-data" action="update.php" method="post" >
		<div class="upmsg">
			<label for="upname">用户名</label>
			<input type="text" name="upname" id="upname" maxlength="20" value="<? echo $rs['sname']; ?>" disabled/>
		</div>
		<div class="upmsg">
			<label>性别</label>
			<?
			if ($rs['ssex'] == '男') {
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
			<input type="text" name="upphone" id="upphone" placeholder="输入11位有效数字" maxlength="11" value="<? echo $rs['sphone']; ?>"/>
		</div>
		<div class="upmsg">
			<label for="upemail">邮箱</label>
			<input type="text" name="upemail" id="upemail" value="<? echo $rs['semail']; ?>"/>
		</div>
		<div class="upmsg">
			<label for="upaddress">地址</label>
			<input type="text" name="upaddress" id="upaddress" value="<? echo $rs['saddress']; ?>"/>
		</div>
		<div class="upmsg usub">
			<input type="submit" value="确认" name="spsub"/>
		</div>
	</form>
</div>
<?
}
if($type=='我的商品'){
$sql1="select * from goods as g,saler as s where g.sid=s.id and s.id=$rs[id] and g.gnow=0";
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
					商品运费
				</th>
				<th>
					操作
				</th>
			</tr>
			<?
			while ($relist = mysql_fetch_array($result1)) {
				$lovelist = "<tr><td>" . $relist['gname'] . "</td><td>" . $relist['gtype'] . "</td><td>" . $relist['gprice'] . "元</td><td>" . $relist['gsend'] . "元</td><td><a href='saler.php?type=修改商品&&id=" . $relist['gid'] . "'>修改</a>&emsp;<a href='operation.php?type=dele&&id=" . $relist['gid'] . "'>下架</a></td></tr>";
				echo $lovelist;
			}
			?>
		</table>
	</div>
</div>
<?
}
if($type=='交易订单'){
$sql2="select * from business as buy,goods as g,saler as s,buyer as b where buy.bgid=g.gid and g.sid=s.id and s.id=$rs[id] and buy.buid=b.id";
$result2=mysql_query($sql2);
$recount2= mysql_num_rows($result2);
?>
<div class="gz">
	<div class="gztitle">
		<p>
			共有<?echo $recount2; ?>条记录
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
					买家信息
				</th>
			</tr>
			<?
			while ($relist2 = mysql_fetch_array($result2)) {
				$blist = "<tr><td>" . $relist2['gname'] . "</td><td>" . $relist2['bgcount'] . "份</td><td>" . $relist2['btotal'] . "元</td><td>" . $relist2['uname'] . "</td></tr>";
				echo $blist;
			}
			?>
		</table>
	</div>
</div>
<?
}
if($type=='发布商品'){
?>
<div class="fb">
	<form enctype="multipart/form-data" action="operation.php" method="post" >
		<div class="upmsg">
			<label for="gdname">商品名称</label>
			<input type="text" name="gdname" id="gdname" maxlength="20" />
			<input type="text" name="sname" maxlength="20" value="<?echo $rs['id']?>" hidden/>
		</div>
		<div class="upmsg">
			<label for="gdmsg">商品信息</label>
			<input type="text" name="gdmsg" id="gdmsg" />
		</div>
		<div class="upmsg">
			<label for="gdintro">商品规格</label>
			<input type="text" name="gdintro" id="gdintro" />
		</div>
		<div class="upmsg">
			<label for="gdprice">商品价格</label>
			<input type="text" name="gdprice" id="gdprice" />
		</div>
		<div class="upmsg">
			<label for="gdsend">商品运费</label>
			<input type="text" name="gdsend" id="gdsend" />
		</div>
		<div class="upmsg">
			<label >商品类型</label>
			<input type="radio" name="gdtype" value="彩妆"/>彩妆
			<input type="radio" name="gdtype" value="护肤"/>护肤
			<input type="radio" name="gdtype" value="卸妆"/>卸妆
			<input type="radio" name="gdtype" value="身体"/>身体
			<input type="radio" name="gdtype" value="头发"/>头发
		</div>
		<div class="upmsg">
			<label >商品图片</label>
			<input type="hidden" name="MAX_FILE_SIZE" value=1000000>
			<input type="file" name="uploadfile[]" size=5000 />
		</div>
		<div class="upmsg xq">
			<label >商品详情图</label>
			<br>		
			 <input type="file" name="uploadfile[]" size=5000 >			
             <input type="file" name="uploadfile[]" size=5000 >			
             <input type="file" name="uploadfile[]" size=5000 >	
             <input type="file" name="uploadfile[]" size=5000>				            
		</div>
		<div class="upmsg usub usubr">
			<input type="submit" value="确认" name="gdsub"/>
		</div>
	</form>
</div>
<?
}
if($type=='关注信息'){
$sql2="select * from ulove as l,goods as g,buyer as b where lgid=g.gid and l.lsid=$rs[id] and l.uid=b.id";
$result2=mysql_query($sql2);
$recount2= mysql_num_rows($result2);
?>
<div class="gz">
	<div class="gztitle">
		<p>
			共有<?echo $recount2; ?>条记录
		</p>
	</div>
	<div class="gzlist">
		<table>
			<tr class="ttitle">
				<th class="goodsname">
					关注的商品
				</th>
				<th>
					商品价格
				</th>
				<th>
					买家信息
				</th>
			</tr>
			<?
			while ($relist2 = mysql_fetch_array($result2)) {
				$blist = "<tr><td>" . $relist2['gname'] . "</td><td>" . $relist2['gprice'] . "元</td><td>" . $relist2['uname'] . "</td></tr>";
				echo $blist;
			}
			?>
		</table>
	</div>
</div>
<?
}
if($type=='修改商品'){
if($_GET['id']){
$salerid=$_GET['id'];
$sql3="select * from goods where gid=$salerid";
$result3=mysql_query($sql3);
$relist3=mysql_fetch_array($result3);
?>
<div class="fb">
	<form enctype="multipart/form-data" action="operation.php" method="post" >
		<div class="upmsg">
			<label for="gdname">商品名称</label>
			<input type="text" name="gdname" id="gdname" value="<?echo $relist3['gname']?>" maxlength="20" />
			<input type="text" name="gdid"  value="<?echo $relist3['gid']?>" maxlength="20" hidden/>
		</div>
		<div class="upmsg">
			<label for="gdmsg">商品信息</label>
			<input type="text" name="gdmsg" id="gdmsg" value="<?echo $relist3['gmsg']?>"/>
		</div>
		<div class="upmsg">
			<label for="gdprice">商品价格</label>
			<input type="text" name="gdprice" id="gdprice" value="<?echo $relist3['gprice']?>"/>
		</div>
		
		<div class="upmsg">
			<label for="gdcount">商品规格</label>
			<input type="text" name="gdcount" id="gdcount"  value="<?echo $relist3['gintro']?>"/>
		</div>
		<div class="upmsg">
			<label for="gdsend">商品运费</label>
			<input type="text" name="gdsend" id="gdsend"  value="<?echo $relist3['gsend']?>"/>
		</div>
		<div class="upmsg usub">
			<input type="submit" value="确认" name="updatesub"/>
		</div>
	</form>
</div>
<?
}
else{
?>
<div class="fb">
	<form enctype="multipart/form-data" action="operation.php" method="post" >
		<div class="upmsg">
			<label for="gdname">商品名称</label>
			<input type="text" name="gdname" id="gdname" value="<?echo $relist3['gname']?>" maxlength="20" />
			<input type="text" name="gdid"  value="<?echo $relist3['gid']?>" maxlength="20" hidden/>
		</div>
		<div class="upmsg">
			<label for="gdmsg">商品信息</label>
			<input type="text" name="gdmsg" id="gdmsg" value="<?echo $relist3['gmsg']?>"/>
		</div>
		<div class="upmsg">
			<label for="gdprice">商品价格</label>
			<input type="text" name="gdprice" id="gdprice" value="<?echo $relist3['gprice']?>"/>
		</div>
		
		<div class="upmsg">
			<label for="gdcount">商品规格</label>
			<input type="text" name="gdcount" id="gdcount"  value="<?echo $relist3['gintro']?>"/>
		</div>
		<div class="upmsg">
			<label for="gdsend">商品运费</label>
			<input type="text" name="gdsend" id="gdsend"  value="<?echo $relist3['gsend']?>"/>
		</div>
		<div class="upmsg usub">
			<input type="submit" value="确认" name="updatesub"/>
		</div>
	</form>
</div>
<?
}
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
