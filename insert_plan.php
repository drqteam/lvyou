<?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}


if(!isset($_POST['submit'])){
	exit('非法访问!');
}

include('conn.php');

mysql_query('SET NAMES utf8');
$uid = $_SESSION['userid'];
$sname = $_POST['sname'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$NUM = $_POST['NUM'];
$time=mktime(0,0,0,$month,$day,$year);

//包含数据库连接文件

$check_query1 = mysql_query("select * from scenic where name = '$sname' ");

if(mysql_fetch_array($check_query1)){
	$sql = "INSERT INTO commonder (pid,sname,time,comnum)VALUES('$uid','$sname',$time,$NUM)";
if(mysql_query($sql,$conn)){
	exit('提交成功！点击此处 <a href="my.php">返回用户中心</a>');
} else {
	echo '抱歉！添加数据失败：',mysql_error(),'<br />';
	exit('点击此处 <a href="visit.html">返回</a> 重试');
}
}

 else {
	exit('无此景点！点击此处 <a href="visit.html">返回</a> 重试');
}

	exit;

?>