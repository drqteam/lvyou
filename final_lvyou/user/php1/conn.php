<?php
/*****************************
*���ݿ�����
*****************************/
include('config.php');
$conn = @mysql_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS); 
if (!$conn){
	die("�������ݿ�ʧ�ܣ�" . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $conn);
//�ַ�ת��������
//д��
mysql_query("set names 'GBK'");
?>