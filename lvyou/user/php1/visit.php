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

$pay = $_POST['prize'];
$name=$_POST['name'];

//包含数据库连接文件
$conn = @mysql_connect("localhost","root","1");
if (!$conn){
	die("连接数据库失败：" . mysql_error());
}
mysql_select_db("2shou", $conn);

mysql_query('SET NAMES utf8');
$check_query1 = mysql_query("select ScenicName,ScenicDetail,price from scenic  where ScenicName like '%$name%'or Price < '$pay'   order by Priority");
$result = mysql_fetch_array($check_query1);
if(!$result){exit("查询失败！");

}

 else {
	echo'
<table border=2  width=600 align="left">';
echo'<TR>',
'<TD>',
'<TH>', '景点名称 ','</TH>',
'<TH>','景点描述 ','</TH>',
'<TH>', '花费 ','</TH>',
'</TD>','</TR>';

do
{echo '<TR>',
'<TD>',
'<TH>', $result['ScenicName'],'</TH>',
'<TH>',$result['ScenicDetail'],'</TH>',
'<TH>',$result['price'] ,'</TH>',
'</TD>',
'</TR>';
$result = mysql_fetch_array($check_query1);
}
while($result);

echo '</table>' ;
}
?>	




