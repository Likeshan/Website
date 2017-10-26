<?php
	/*连接数据库*/
	$conn = @mysql_connect("localhost","root","lks112700.");
	if(!$conn){
		die("数据库连接失败:".mysql_error());
	}
	mysql_select_db("person",$conn);
	mysql_query("set character set 'gbk'");
	mysql_query("ser names 'gbk'");
?>