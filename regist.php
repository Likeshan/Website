<?php
include('conn.php');
if(!isset($_POST['submit']))
{
	exit("Method error!");
}
$phonenum = $_POST['phonenum'];
$password = $_POST['password'];
$email = $_POST['email'];
$nickname = $_POST['nickname'];
if(strlen($phonenum)!=11)
{
	exit("错误：手机号码长度错误!");
}
if(!preg_match('/^[a-zA-Z0-9\._+]+@[A-Za-z0-9]+\.[a-zA-Z]+$/', $email))
{
	exit("错误：电子邮箱格式错误!");
}
if(strlen($password) < 6)
{
	exit("错误：密码长度太短！");
}
$check_query = mysql_query("select id from user where email='$email' limit 1");
if(mysql_fetch_array($check_query))
{
	exit("Email already exists!");
}
$password = md5($password);
$sql = "INSERT INTO user(phonenum,password,email,nickname)VALUES('$phonenum','$password','$email','$nickname')";
if(mysql_query($sql,$conn))
{
	exit('Regist suceese!tag to<a href="login.html">login</a>');
}
else
{
	exit("Read database error!");
}
?>