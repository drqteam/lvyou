<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>ɾ��������Ϣ</title>
</head>
<body>
<?PHP
  //ֻ�й���Ա��ǿ��ɾ�������Ȩ��
  include('..\class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->delete($gid);
  print("<h3>��Ʒ��Ϣ�ɹ�ɾ��</h3>");
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>