<?php
/*****************************
*���ݿ�����
*****************************/
$conn = @mysql_connect("localhost","root","1");
if (!$conn){
	die("�������ݿ�ʧ�ܣ�" . mysql_error());
}
mysql_select_db("2shou", $conn);
//�ַ�ת��������
//д��
mysql_query("set names 'GBK'");
?>