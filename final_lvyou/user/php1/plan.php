<body background="../images/background.jpg">
<?php
session_start();
error_reporting(0);

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}





//�������ݿ������ļ�
include('conn.php');


$uid=$_SESSION['user_id'];
$check_query = mysql_query("select id,comnum, sname,time,addrequest from commonder where pid =  '$uid'  ");



	$result = mysql_fetch_array($check_query);
if(!$result){exit("����û��������мƻ�������ύ���мƻ�������");

}

 else {
	echo'
<table border=1  width=1000 align="left">';
echo'<TR>',
'<TD>',
'<TH>', '�������� ','</TH>',
'<TH>','ͬ���������� ','</TH>',
'<TH>', '�ύʱ�� ','</TH>',
'<TH width=500>', '����Ҫ�� ','</TH>',
'<TH >', '���� ','</TH>',
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
  <a href="PlanEdit.php?gid=<?PHP echo $result['id']; ?>" target=_blank>�޸�</a>&nbsp;
  <a href="plandelt.php?gid=<?PHP echo $result['id']; ?>" target=_blank>ɾ��</a>&nbsp;
  <a href="planfoundteam.php?gid=<?PHP echo $result['id']; ?>">Ѱ��¿��</a>&nbsp;
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