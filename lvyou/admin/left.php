<html>
<head>
<title>��̨����</title>
<link href="../style.css" rel="stylesheet">
<base target="main">
</head>

<body topmargin="4" leftmargin="4" bgcolor="#eeeeee">
<div align="center">
  <center>
<table border="0" width="90%" height="300">
  <tr>
    <td width="100%" height="6"></td>
  </tr>
  <tr>
    <td width="100%" height="6"><font color="#000080">ϵͳ����</font></td>
  </tr>
  <tr>
    <td width="100%"   height="6">&nbsp;<font color="#0000FF">  
      <a href="TypeList.php" target="main">��Ʒ����</a></font></td>
  </tr>
  <tr>
    <td width="100%"  height="6">&nbsp;<font color="#0000FF">
    <a href="BulletinList.php">�������</a></font></td>
  </tr>
  <tr>
    <td width="100%"  height="6">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="100%" height="6"><font color="#000080">��Ʒ����</font></td>
  </tr>
<?PHP
  include('..\Class\GoodsType.php');
  $objType = new GoodsType();
  $results = $objType->GetGoodsTypelist();
  while($row = $results->fetch_row())  {
?>
  <tr>
    <td width="100%"  height="6">&nbsp;<font color="#0000FF">  
      <a href="GoodsList.php?type=<?PHP echo($row[0]); ?>" target="main"><?PHP   echo($row[1]); ?></a></font></td>
  </tr>
<?PHP 
    } 
?>
  <tr>
    <td width="100%"  height="6">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="100%" height="6"><font color="#000080">�û�����</font></td>
  </tr>
  <tr>
    <td width="100%"  height="6">&nbsp;<font color="#0000FF">  
      <a href="UserList.php?flag=0" target="main">�û��б�</a></font></td>
  </tr>
  <tr>
    <td width="100%"  height="6">&nbsp;<font color="#0000FF">
      <a href="AdminPwdChange.php" target="main">�����޸�</a></font></td>
  </tr>

</table>
  </center>
</div>
</body>
</html>