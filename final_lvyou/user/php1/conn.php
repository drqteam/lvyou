<?php
/*****************************
*数据库连接
*****************************/
include('config.php');
$conn = @mysql_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS); 
if (!$conn){
	die("连接数据库失败：" . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $conn);
//字符转换，读库
//写库
mysql_query("set names 'GBK'");
?>