<html>
<head>
<title>���湫��</title>
</head>
<body>
<?PHP
  include('../Class/Users.php');
  include('../Class/Diary.php');
  session_start();
  //�õ��������������Ϊadd���ʾ�������棬���Ϊupdate���ʾ���Ĺ���
  $StrAction=$_GET["action"];
  // ��ȡ��ǰ�û���Ϣ
  $objUser = new Users();
  $objUser->GetUsersInfo($_SESSION["user_id"]);
  // ���ù�����Ϣ
  $objBul = new Diary();
  //ȡ�ù�����Ŀ�����ݺ��ύ���û���
  $objBul->Title=$_POST["title"];
  $objBul->Content=$_POST["content"];
  $objBul->Poster=$objUser->Name;
  $objBul->PostTime=strftime("%Y-%m-%d %H:%M:%S");

  if ($StrAction=="add")
  {
    //�����ݿ��Board�в����¹�����Ϣ
    $objBul->insert();
  }
  else
  {
    //���Ĵ˹�����Ϣ
    $id=$_GET["id"];
    $objBul->update($id);
  } 

  print "<h3>����ɹ�����</h3>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>