<?php
include('conn.php');
if(!isset($_POST['submit']))
{
	exit("Method error!");
}
$phonenum = $_POST['phonenum'];
$password = md5($_POST['password']);
$check_query = mysql_query("select id from user where phonenum = '$phonenum' and password = '$password' limit 1");
if($result = mysql_fetch_array($check_query))
{
	echo "welcome,login success!";
	echo "<br/><a href='login.html'>Back to login</a>";
	exit;
}
else{
	exit("登录失败！");
}