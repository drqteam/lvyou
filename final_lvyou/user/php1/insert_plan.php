<?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}


if(!isset($_POST['submit'])){
	exit('非法访问!');
}

include('conn.php');

//mysql_query('SET NAMES utf8');
$uid = $_SESSION['user_id'];
$sname = $_POST['sname'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$NUM = $_POST['NUM'];
$text=$_POST['text'];
$time=mktime(0,0,0,$month,$day,$year);

//包含数据库连接文件

$check_query1 = mysql_query("select * from Scenic where ScenicName = '$sname' ");

if(mysql_fetch_array($check_query1)){
	$sql = "INSERT INTO commonder (pid,sname,time,comnum,addrequest)VALUES('$uid','$sname',$time,$NUM,'$text')";
if(mysql_query($sql,$conn)){
	exit('提交成功！');
} else {
	exit ('抱歉！添加数据失败：');
}
}

 else {
	exit('无此景点！');
}

	exit;

?>