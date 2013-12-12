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

$uid=$_SESSION['user_id'];
$check_query = mysql_query("select comnum, sname,time,addrequest from commonder where pid =  '$uid'  ");



	$result = mysql_fetch_array($check_query);
if(!$result){exit("查询失败！");

}

 else {
	echo'
<table border=1  width=1000 align="left">';
echo'<TR>',
'<TD>',
'<TH>', '景点名称 ','</TH>',
'<TH>','同行人数上限 ','</TH>',
'<TH>', '提交时间 ','</TH>',
'<TH width=500>', '其他要求 ','</TH>',
'</TD>','</TR>';

do
{echo '<TR>',
'<TD>',
'<TH>', $result['sname'],'</TH>',
'<TH>',$result['comnum'],'</TH>',
'<TH>',date("Y-m-d", $result['time']) ,'</TH>',
'<TH width=500>', $result['addrequest'],'</TH>',
'</TD>',
'</TR>';
$result = mysql_fetch_array($check_query);
}
while($result);

echo '</table>' ;
}

?>