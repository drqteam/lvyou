<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>�û�ע��</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	if (document.myform.userid.value=='') {
		window.alert ("�������û�����")
		myform.userid.focus()
		return false
	}
	if (document.myform.userid.value.length<=2) {
		window.alert ("���û������ȱ������2��")
		myform.userid.focus()
		return false
	}
	if (document.myform.username.value=='') {		
		window.alert ("�������û�������")
		myform.username.focus()
		return false
	}
	if (document.myform.pwd.value.length<6) {		
		window.alert ("���볤��Ҫ����ڵ���6��")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd.value=='') {		
		window.alert ("�����������룡")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd1.value=='') {		
		window.alert ("��ȷ�������룡")
		myform.pwd1.focus()
		return false
	}
	if (document.myform.pwd.value!=document.myform.pwd1.value) {		
		window.alert ("������������������ͬ��")
		return false
	}
	return true
}
</script>
<body>
<form method="POST" action="UserSave.php" name="myform" onSubmit="return ChkFields()">
<h3></h3>
<p align="center">�û���Ϣע��</p>
<input type="hidden" name="isadd" value="new">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
      <tr>
        <td width="18%" align=left bgcolor="#CCFFCC">�û�ID</td>
		<td width="82%"><input type="text" name="userid" size="20"></td>
	  </tr>
	  <tr>
		<td align=left bgcolor="#CCFFCC">�û�����</td>
		<td><input type="text" name="username" size="20"></td>
      </tr>
	  	  <tr>
	    <td align=left bgcolor="#CCFFCC">�û�����</td>
        <td><input type="password" name="pwd" size="20"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#CCFFCC">ȷ������</td>
        <td><input type="password" name="pwd1" size="20"></td>
      </tr>
      <tr>
	    <td align=left bgcolor="#CCFFCC">�û��Ա�</td>
        <td><select name="sex">
        <option value="0">��</option>
        <option value="1">Ů</option>
        </select></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">��ס��Ԣ</td>
        <td><input type="text" name="address" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">�ֻ�����</td>
        <td><input type="text" name="phone" size="40"></td>
      </tr>
  </table> 
<p align="center"><input type="submit" value=" �� �� " name="B2"></p>
</form>  
</body>
</html>