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


$uid=$_SESSION['user_id'];
$check_query = mysql_query("select id,comnum, sname,time,addrequest from commonder where pid =  '$uid'  ");



	$result = mysql_fetch_array($check_query);
if(!$result){exit("您还没有添加旅行计划，点击提交旅行计划来创建");

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
'<TH >', '功能 ','</TH>',
'</TD>','</TR>';

do
{echo '<TR>',
'<TD>',
'<TH>', $result['sname'],'</TH>',
'<TH>',$result['comnum'],'</TH>',
'<TH>',date("Y-m-d", $result['time']) ,'</TH>',
'<TH width=500>', $result['addrequest'],'</TH>',
'</TD>';
?>
<td align=center>
  <a href="PlanEdit.php?gid=<?PHP echo $result['id']; ?>" target=_blank>修改</a>&nbsp;
  <a href="plandelt.php?gid=<?PHP echo $result['id']; ?>" target=_blank>删除</a>&nbsp;
  <a href="planfoundteam.php?gid=<?PHP echo $result['id']; ?>">寻找驴友</a>&nbsp;
 </td>
<?php
echo
'</TR>';
$result = mysql_fetch_array($check_query);
}
while($result);

echo '</table>' ;
}

?>