<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<?PHP 
  //�����ݿ�������ɾ��������Ϣ
  //��ȡҪɾ���Ĺ�����
  $id=$_GET["id"];
  include('..\Class\Bulletin.php');
  $obj = new Bulletin();
  $obj->delete($id);
?>
</form>
</body>
<script language="javascript">
  alert("�ɹ�ɾ����");
  location.href = "BulletinList.php";
</script>
</html>
















