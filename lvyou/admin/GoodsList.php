<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
<link href="../style.css" rel="stylesheet">
</head>
<?PHP 
  $m=0;
  $itype=$_GET["type"];
?>
<body>
<table border="1" width="100%" cellspacing="0" bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td bgcolor=#66CCFF height=24 colspan=2 align="center"><b>������Ϣ</b></td></tr></table>
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr  bgcolor="#CCFFFF">
<td align=center width="20%">��������</td>
<td align=center width="20%">������Ϣ</td>
<td align=center width="20%">�۸�</td>
<td align=center width="20%">����ʱ��</td>
<td align=center width="20%">�޸�</td>
</tr>
<?PHP 
  include('..\Class\Goods.php');
  print 1;
  $obj = new Goods();
  $results = $obj->GetGoodslist;
  while($row = $results->fetch_row())
  {
    $m=$m+1;
    $objUser = new Users();
    $objUser->GetUsersInfo($row[15]);
?><tr>
  <td align=center><a href="../GoodsView.php?gid=<?PHP   echo($row[0]); ?>" target=_blank><?PHP   echo($row[3]); ?></a></td>
  <td align=center><a href="../UserView.php?uid=<?PHP   echo($row[15]); ?>"  target=_blank><?PHP   echo($objUser->Name); ?></a></td>  
  <td align=center><?PHP   echo($row[6]); ?></td>
  <td align=center><?PHP   if ($row[14]==1)
  {
?>�ѽ���
<?PHP   
  }
    else
  {
?>
	δ����
<?PHP   
  } 
?>
  </td>
  <td align=center><a href="GoodsDelt.php?gid=<?PHP echo($row[0]); ?>" onClick="if(confirm('ȷ��ɾ����Ʒ?')){return this.href;}return false;" target=_blank>ɾ��</a></td>
  </tr>  
<?PHP
} 
if ($m==0)
{
  print "<tr><td align=center colspan=5>û����Ʒ</td></tr>";
} 
?>
</table>   
</body>