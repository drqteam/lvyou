<?php
session_start();
error_reporting(0);

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}

//�������ݿ������ļ�
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
	echo '����˴� <a href="my.php">�����û�����</a>';
	exit;

?>