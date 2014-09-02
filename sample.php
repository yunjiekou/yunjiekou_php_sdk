<?php
	header("Content-type:text/text");
	require_once("./yunjiekou.class.php");
	$yjk = new YunJieKou();
	echo $yjk->req("yundou.balance");	
	
?>