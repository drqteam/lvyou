<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>������ǹ���</title>
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
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<body>
<form name="myform" method="POST" action="BulletinSave.php?action=add" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%">�������
            <input type="text" name="title" size="20"></td>
          </tr>
          <tr>
            <td width="100%">��������</td>
          </tr>
          <tr>
            <td width="100%"><textarea rows="12" name="content" cols="55"></textarea></td>
          </tr>
        </table>
        <p align="center"><input type="submit" value=" �� �� " name="B1">
        <input type="reset" value=" ��д " name="B2"></p>
</form>
</body>
</html>