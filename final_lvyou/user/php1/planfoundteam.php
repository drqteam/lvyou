<body background="../images/background.jpg">
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
$gid=$_GET["gid"];

$check_query = mysql_query("select * from commonder where  id = '$gid' ");
$result = mysql_fetch_array($check_query);
$sname=$result['sname'];
$comnum=$result['comnum'];
$time=$result['time'];

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
	$check_query1 = mysql_query("select UserId,Address,Email from Users where UserId = '$id' ");	
		if($result1=mysql_fetch_array($check_query1))
		echo '<TR>',
'<TD>',
'<TH>', $result1['UserId'],'</TH>',
'<TH>',$result1['Address'],'</TH>',
'<TH>', $result1['Email'],'</TH>',
'<TH width=500>', $result['addrequest'],'</TH>',
'</TD>','</TR>';
			
}
echo '</table>';


?>