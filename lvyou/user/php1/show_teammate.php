<?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}

//包含数据库连接文件
include('conn.php');
//mysql_query('SET NAMES utf8');
$uid=$_SESSION['user_id'];
$sname=$_POST['sname'];
$comnum=$_POST['num'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$time=mktime(0,0,0,$month,$day,$year);

$check_query = mysql_query("select pid , addrequest from commonder where  comnum = '$comnum' and time = '$time' and not pid =  '$uid' and  sname = '$sname' ");
echo'<table border=1  width=1000 align="left">';
echo'<TR>',
'<TD>',
'<TH>', '用户ID ','</TH>',
'<TH>','地址 ','</TH>',
'<TH>', '用户邮箱 ','</TH>',
'<TH width=500>', '其他要求 ','</TH>',
'</TD>','</TR>';
while($result = mysql_fetch_array($check_query)){

$id=$result['pid'];
	$check_query1 = mysql_query("select UserId,address,email from users where UserId = '$id' ");	
		if($result1=mysql_fetch_array($check_query1))
		echo '<TR>',
'<TD>',
'<TH>', $result1['UserId'],'</TH>',
'<TH>',$result1['address'],'</TH>',
'<TH>', $result1['email'],'</TH>',
'<TH width=500>', $result['addrequest'],'</TH>',
'</TD>','</TR>';
			
}
echo '</table>';


?>