<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<?PHP  
  //�����ݿ�������ɾ����Ϣ
  //��ȡҪɾ���ı��
  session_start();
error_reporting(0);

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}

//�������ݿ������ļ�
include('conn.php');
  $gid=$_GET["gid"];
  mysql_query("delete from commonder where id = '$gid'  ") or die("ɾ��ʱ����");
  print "ɾ���ɹ�!";
?>

</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>