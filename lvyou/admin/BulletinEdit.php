<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>�༭������Ϣ</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<script language="javascript">
  function checkFields()
  {
    if (myform.title.value=="") {
       alert("������Ŀ����Ϊ��");
       myform.title.onfocus();
       return false;
    }
    if (myform.content.value=="") {
       alert("�������ݲ���Ϊ��");
       myform.content.onfocus();
       return false;
    }
    return true;
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><style type="text/css">
<!--
body,td,th {
	color: #D4D0C8;
}
body {
	background-color: #FFFFFF;
}
.STYLE1 {color: #000000}
-->
</style></head>
<body>

<?PHP
  //�����ݿ���ȡ�ô˹�����Ϣ
  //��ȡ����id
  $id=$_GET["id"];
  //���ݲ���id��ȡָ���Ĺ�����Ϣ
  include('..\Class\Bulletin.php');
  $obj = new Bulletin();
  $obj->GetBulletinInfo($id);
  //�����¼��Ϊ�գ�����ʾû�д˹���
  if($obj->Id==0)
  {
    exit("û�д˹���");
  }
  else
  {
  //�����������ڱ������ʾ��������
?>
<form name="myform" method="POST" action="BulletinSave.php?action=update&id=<?PHP echo($id); ?>" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">�������
            <input type="text" name="title" size="20" value="<?PHP echo($obj->Title); ?>">
            </span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">��������</span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><textarea rows="12" name="content" cols="55"><?PHP echo($obj->Content); ?></textarea></td>
          </tr>
  </table>
        <p align="center"><input type="submit" value=" �� �� " name="B1">
        <input type="reset" value=" ��д " name="B2"></p>
<?PHP 
} 
?>
</form>
</body>
</html>