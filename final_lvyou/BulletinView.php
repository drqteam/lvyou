<html>
<body background="images/background.jpg">
<head>
<title>����·���Ƽ�</title>
<link href=style.css rel=STYLESHEET type=text/css>
<script language="javascript">
  function checkFields()
  {
    if (myform.title.value=="") {
       alert("��Ŀ����Ϊ��");
       myform.title.onfocus();
       return false;
    }
    if (myform.content.value=="") {
       alert("���ݲ���Ϊ��");
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
  include('Class/Bulletin.php');
  //�����ݿ���ȡ�ô˹�����Ϣ
  //��ȡ����id
  $id=$_GET["id"];
  //���ݲ���id��ȡָ���Ĺ�����Ϣ
  $obj = new Bulletin();
  $results = $obj->GetBulletinInfo($id);
  //�����¼��Ϊ�գ�����ʾû�д˹���
  if($obj->Id==0)
  {
    exit("û�д�����");
  }
  else
  {
?>
<form name="myform" method="POST" action="BulletinSave.asp?action=update&id=<?PHP echo $id; ?>" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">����
            <input type="text" readonly="true" name="title" size="20" value="<?PHP echo($obj->Title); ?>">
            </span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">��������</span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><textarea rows="12" readonly="readonly" name="content" cols="55"><?PHP  echo($obj->Content); ?></textarea></td>
          </tr>
  </table>
<?PHP  
} 
?>
</form>
<?PHP 
$obj=null;
?>
</body>
</html>