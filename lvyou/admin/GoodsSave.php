<?PHP
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  session_start();
?>
<html>
<head>
<title>������Ʒ��Ϣ</title>
</head>
<body>
<?PHP  	
  //�õ��������������Ϊadd���ʾ��Ӳ��������Ϊedit���ʾ���Ĳ���
  $StrAction=$_GET["action"];
  // ����Goods���󣬱�����Ʒ����
  include('..\Class\Goods.php');
  $obj = new Scenic();
  $obj->ScenicName=$_POST["aname"];
  $obj->ScenicDetail=$_POST["adetail"];
  $obj->Price=$_POST["sprice"];
  $obj->StartTime=$_POST["stime"];
  $obj->Priority=$_POST["pmode"];
  if ($StrAction=="edit")
  {
    $gid=$_GET["gid"];
    $obj->update($gid);
  }
  else
  {
    $obj->ImageUrl=$_POST["goodsimage"];
    $obj->insert();
  }
  print "<h3>��Ʒ��Ϣ�ɹ�����</h3>" ;
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>