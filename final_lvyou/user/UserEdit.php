<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>�޸��û�ע��</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	if (document.myform.username.value=='') {		
		window.alert ("�������û�������")
		myform.username.focus()
		return false
	}
}
</script>
<body>
<?PHP  
  $uid=$_GET["uid"];
  $new.$Person;
  $obj.$GetPersonInfo[$uid];
if ($obj.$UserId=="")
{
  print "<h2>�����ڴ��û�����</h2>";
}
  else
{
?>
<form method="POST" action="UserSave.asp?uid=<?PHP echo $uid; ?>" name="myform" onSubmit="return ChkFields()">
<p align="center">�޸ĸ�����Ϣ</p>
<input type="hidden" name="isadd" value="edit">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
      <tr>
        <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">�û��˺�</td>
		<td><?PHP echo $obj.$UserId; ?></td>
	  </tr>
	  <tr>
		<td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">�û�����</td>
		<td><input type="text" name="username" size="20" value="<?PHP echo $obj.$Name; ?>"></td>
      </tr>
      <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">�û��Ա�</td>
        <td><select name="sex">
<?PHP    
  if ($obj.$Sex==1)
  {
?>
        <option value="0">��</option>
        <option value="1" selected>Ů</option>
<?PHP    
  }
    else
  {
?>
        <option value="0" selected>��</option>
        <option value="1">Ů</option>
<?PHP    
  } 
?>
        </select></td>
      </tr>
	  <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">��ס��Ԣ</td>
        <td>
        <input type="text" name="address" size="40" value="<?PHP echo $obj.$Address; ?>"></td>
      </tr>      
	   
	  <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">�ֻ�����</td>
        <td><input type="text" name="mobile" size="40" value="<?PHP echo $obj.$Phone; ?>"></td>
      </tr>
	    
  </table> 
<p align="center"><input type="submit" value=" �� �� " name="B2"></p>
<?PHP  
  } 
?>
</form>  
</body>
</html>