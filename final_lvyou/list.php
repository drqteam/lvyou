<html>
<head>
<link href=style.css rel=STYLESHEET type=text/css>
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
</head>
<body>
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><a href="images/title.jpg">
	<img src="images/title.jpg" border="0" width="800" height="100"></a></td></tr>
  <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<?PHP 
  //��ȡ����, tid��ʾ��Ʒ���ͱ�ţ�flag��ʾת�û�������
  $tid=intval($_GET["tid"]);
  $flag=intval($_GET["flag"]);
  if($flag==0)
  {
?>
   <B>ת����Ϣ</B>&nbsp;&nbsp;<a href="list.php?flag=1&tid=<?PHP echo($tid); ?>">����Ϣ</a>
<?PHP 
  }
  else
 {
?>
   <a href="list.php?flag=0&tid=<?PHP echo($tid); ?>">ת����Ϣ</a>&nbsp;&nbsp;<B>����Ϣ</B>
<?PHP 
 } 
?>   
  </td>  
  </tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td colspan=6 bgcolor="#FFFFFF">
	<p align="center"><font color=#3399FF><b>����Ʒ��Ϣ - 
<?PHP 
  include('Class/GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($tid);
  echo($objType->TypeName);
?>��</b></font></td></tr>
<tr><td colspan=6 bgcolor="#FFFFFF">
<center><input type="button" value="��Ҫת��" onclick="newwin('user/GoodsAdd.php?flag=0&tid=<?PHP echo($tid); ?>')" name=add>&nbsp;&nbsp;
<input type="button" value="��Ҫ��" onclick="newwin('user/GoodsAdd.php?flag=1&tid=<?PHP echo($tid); ?>')" name=add></center></td></tr>

<tr>
<td align=center width="15%" bgcolor="#E1F5FF">��ƷͼƬ</td>
<td align=center width="20%" bgcolor="#E1F5FF">��Ʒ����</td>
<td align=center width="15%" bgcolor="#E1F5FF">�۸�</td>
<td align=center width="12%" bgcolor="#E1F5FF">�¾ɳ̶�</td>
<td align=center width="12%" bgcolor="#E1F5FF">����</td>
<td align=center width="26%" bgcolor="#E1F5FF">����ʱ��</td>
</tr>
<?PHP  
  //����ת�û��󹺵Ĳ�ѯ����
  if($flag==0)
  {
    $cond=" WHERE SaleOrBuy=1";
  }
  else
  {
    $cond=" WHERE SaleOrBuy=2";
  } 

  //������Ʒ�����ѯ����
  if ($tid>0)
  {
    $cond=$cond." AND TypeId=".$tid;
  } 
  // ֻ�鿴δ��������Ʒ
  $cond=$cond." AND IsOver=0";
  //����Goods���󣬶�ȡ���������ļ�¼
  include('Class/Goods.php');
  $obj = new Goods();
  $results = $obj->GetGoodslist($cond);
  $m=0;
  while($row = $results->fetch_row())
  {
?>
  <tr><td align=center bgcolor="#FFFFFF"><?PHP if ($row[5]=="")
  {
?>
	<img src="images/noImg.jpg" height=50 border=0>
<?PHP    
  }
    else
  {
?>
	<img src="user/images/<?PHP echo($row[5]); ?>" height=50 border=0>
<?PHP    
  } 
?>
  </td>
  <td align=center bgcolor="#FFFFFF"><a href="GoodsView.php?gid=<?PHP echo($row[0]); ?>" target=_blank><?PHP    echo($row[3]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[6]); ?></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[8]); ?>&nbsp;</td>
  <td align=center bgcolor="#FFFFFF"><a href="user/UserView.php?uid=<?PHP echo($row[15]); ?>" target=_blank><?PHP    echo($row[15]); ?></a></td>
  <td bgcolor="#FFFFFF" align="center"><?PHP echo($row[7]); ?></td>
  </tr>  
<?PHP    
	$m=$m+1;
  } 
  if ($m==0)
  {
    print "<tr><td bgcolor=#FFFFFF align=center colspan=6>������Ʒ��Ϣ</td></tr>";
  }  
?>
</table>
</td>
</tr>
</table>
</body>
</html>