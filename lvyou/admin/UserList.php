<?PHP 
include('isAdmin.php');
?>
<html>
<head>
<title>ϵͳ�û�����</title>
<link href="../style.css" rel="stylesheet">
<script language="JavaScript">
function newwin(url) {
  var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=380");
  newwin.focus();
  return false;
}
</script>
</head>
<body link="#000080" vlink="#008080">
<h3 align="center">�û��б�</h3>
<table width='90%' align=center cellspacing=0 cellpadding=0 border=1 bordercolor="#808080" bordercolordark="#FFFFFF" bordercolorlight="#4DA6FF">
<tr>
<td align="center" width='10%' bgcolor="#eeeeee"><b>�û���</b></td>
<td align="center" width='16%' bgcolor="#eeeeee"><b>��ʵ����</b></td>
<td align="center" width='16%' bgcolor="#eeeeee"><b>��ַ</b></td>
<td align="center" width='20%' bgcolor="#eeeeee"><b>�ƶ��绰</b></td>
<td align="center" width='22%' bgcolor="#eeeeee"><b>�� ��</b></td>
</tr>
<?PHP
  include('..\Class\Users.php');
  $obj = new Users();
  $results = $obj->GetUserslist();
  $rCount=0;
  //ѭ����ʾ���е��û����ݣ�ͬʱ�������
  while($row = $results->fetch_row())
  {
    $rCount++;
?>
<tr>
<td align=center><?PHP echo($row[0]);  /*�û��˺�*/ ?></td>
<td align=center><?PHP echo($row[2]); /*�û�����*/?></td>
<td align=center><?PHP echo($row[4]); /*��ס��Ԣ*/?>&nbsp;</td> 
<td align=center><?PHP echo($row[5]); /*�ֻ�����*/?>&nbsp;</td>
<td align="center">
<?PHP    
  if($row[0]!="Admin")
  {
?>
<a href=UserDelt.php?userid=<?PHP echo($row[0]); ?>  onClick="if(confirm('ȷ��ɾ�����û�?')){return newwin(this.href);}return false;">ɾ��</a>
<?PHP    
  } 
?>&nbsp;
</td>
</tr>

<?PHP  
  } 
  if($rCount==0)
  {
    print("<tr align='center'><td colspan=6><font color=red>Ŀǰ��û���û���¼</font></td></tr>");
  }
  else
  {
    print "<tr align='center'><td colspan=6><font color=red>��ǰ����".trim($rCount)."���û���¼</font></td></tr>";
  } 
?>
</table>
</body>
</html>