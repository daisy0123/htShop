<?php
$server="localhost";
$user="root";
$password="";
$db_name="shop";
$conn=mysql_connect($server,$user,$password) ;
if(!$conn){
	echo"数据库连接失败";
	exit;
}
mysql_select_db($db_name);
mysql_query("SET NAMES UTF8");
?>