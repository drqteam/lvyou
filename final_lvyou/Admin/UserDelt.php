<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>ɾ���û���Ϣ</title>
</head>
<body>
<?PHP
  //ֻ�й���Ա��ǿ��ɾ����Ʒ��Ȩ��
  include('../Class/Users.php');
  $UserId=$_GET["userid"];
  $obj = new Users();
  $obj->delete($UserId);
  print("<h3>�û���Ϣ�ɹ�ɾ��</h3>");
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>