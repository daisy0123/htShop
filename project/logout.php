<?php
session_start();
session_unset();
session_destroy() ;
include "config.php";
	$sql5 = "update orders set buy=0 ";
		$result5 = mysql_query($sql5);
			$sql6 = "delete from buy_soon ";
		$result6 = mysql_query($sql6);
		mysql_close();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="0; url=index.php" />
