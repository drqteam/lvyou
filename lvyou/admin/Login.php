<?PHP
ob_start();
?>
<?PHP
  //����¼����û���Ϣ��ѯ����
  session_start();
  include('../class/Users.php');
  $AdminId=$_SESSION["UserName"];
  $AdminPwd=$_SESSION["$UserPwd"];
  if($AdminId!="")
  {
    $objUser = new Users();
    $objUser->GetUsersInfo($AdminId);
    if ($objUser->UserId!="" && $objUser->UserPwd==$AdminPwd && $objUser->UserType==1)
    {
      $_SESSION["UserType"]=1;
      header("Location: "."Index.php");
    } 
  } 
?>
<html>
<head>
<title>����Ա��¼</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<form name="myform" action="putSession.php" method="Post">
<br>
<table border="0" align="center">
<tr><td align=center><h2>&nbsp;&nbsp;����Ա��¼</h2></td></tr>
</table>
<table border="0" align="center">
     <tr>
      <td align="right">����Ա�˺�:</td>
      <td><input maxLength="20" name="loginname" size="30"></td>
     </tr>
    <tr>
      <td align="right">����Ա����:</td>
      <td><input maxLength="20" name="password" size="30" type="password"></td>
    </tr>
    <tr>
	 <td align="right">&nbsp;</td>
   	 <td align="center">&nbsp;</td>
    </tr>
	<tr>
	 <td align="right">&nbsp;</td>
   	 <td align="center"><input type="submit" value=" ��&nbsp;&nbsp;&nbsp;¼ "></td>
    </tr>

</table>
</form>
</body>
</html>