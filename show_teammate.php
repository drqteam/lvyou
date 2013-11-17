<?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}

//包含数据库连接文件
include('conn.php');
//mysql_query('SET NAMES utf8');
$uid=$_SESSION['userid'];
$sname=$_POST['sname'];
$comnum=$_POST['num'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$time=mktime(0,0,0,$month,$day,$year);

$check_query = mysql_query("select pid from commonder where  comnum = '$comnum' and time = '$time' and not pid =  '$uid' and sname = '$sname' ");

while($result = mysql_fetch_array($check_query)){

$id=$result['pid'];
	$check_query1 = mysql_query("select username,email from user where uid = '$id' ");	
		if($result1=mysql_fetch_array($check_query1))
			echo $result1['username'], ' ' ,$result1['email'] ,'<br />';
}
	echo '点击此处 <a href="my.php">返回用户中心</a>';
	exit;

?>