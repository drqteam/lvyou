<?PHP
ob_start();
?>
<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
<script language="javascript">
function newwin(url) 
{
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=100";
  oth = oth+",width=600,height=500";
  var newwin = window.open(url,"newwin",oth);
  newwin.focus();
  return false;
}
</script>
<title>�����б�</title>
</head>
<body>
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="250"></a></td></tr>
  <tr>
<?PHP  
  session_start();
  include('../Class/Goods.php');
  $obj = new Scenic();
  $results = $obj->GetSceniclist();
  if ($flag==0)
  {
?>
   
<?PHP  
  }
  else
{
?>
<?PHP  
} 
?>    
</tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td colspan=6 bgcolor="#FFFFFF">
	<p align="center"><font color=#3399FF><b>��������Ϣ��</b></font></td></tr>
<tr>
<td align=center width="20%" bgcolor="#E1F5FF">����ͼƬ</td>
<td align=center width="20%" bgcolor="#E1F5FF">��������</td>
<td align=center width="20%" bgcolor="#E1F5FF">�۸�</td>
<td align=center width="20%" bgcolor="#E1F5FF">����ʱ��</td>
<td align=center width="20%" bgcolor="#E1F5FF">����</td>

</tr>
<?PHP  
  $m=0;
  while($row = $results->fetch_row())
  {
?>
  <tr><td align=center bgcolor="#FFFFFF"><?PHP if ($row[3]=="")
  {
?><img src="../images/noImg.jpg" width="100" height="50" border="0">
<?PHP    
  }
  else
  {
?>
	<img src="images/<?PHP echo($row[3]);?>" height=50 border=0>
<?PHP    
  } 
?>
  </td>
  <td align=center bgcolor="#FFFFFF"><a href="../GoodsView.php?gid=<?PHP echo($row[0]); ?>" target=_blank><?PHP   echo($row[1]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[4]); ?></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[5]); ?>&nbsp;</td>
  <td align=center bgcolor="#FFFFFF">
  <a href="GoodsEdit.php?gid=<?PHP echo($row[0]); ?>" target=_blank>�޸�</a>&nbsp;
  <a href="GoodsDelt.php?gid=<?PHP echo($row[0]); ?>" target=_blank>ɾ��</a>&nbsp;
  </td>
  </tr>  
<?PHP    
  $m=$m+1;
  } 
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>���޾�����Ϣ</td></tr>");
  } 
?>
</table>
                <p align="center">
		<input type="button" value="��Ӿ�����Ϣ" onclick="newwin('GoodsAdd.php')" name=add>
</td>
</tr>
</table>
</body>
</html>