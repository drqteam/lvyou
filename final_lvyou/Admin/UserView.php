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
<title>景区列表</title>
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
	<p align="center"><font color=#3399FF><b>【景区信息】</b></font></td></tr>
<tr>
<td align=center width="20%" bgcolor="#E1F5FF">景区图片</td>
<td align=center width="20%" bgcolor="#E1F5FF">景区名称</td>
<td align=center width="20%" bgcolor="#E1F5FF">价格</td>
<td align=center width="20%" bgcolor="#E1F5FF">开放时间</td>
<td align=center width="20%" bgcolor="#E1F5FF">操作</td>

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
  <a href="GoodsEdit.php?gid=<?PHP echo($row[0]); ?>" target=_blank>修改</a>&nbsp;
  <a href="GoodsDelt.php?gid=<?PHP echo($row[0]); ?>" target=_blank>删除</a>&nbsp;
  </td>
  </tr>  
<?PHP    
  $m=$m+1;
  } 
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无景区信息</td></tr>");
  } 
?>
</table>
                <p align="center">
		<input type="button" value="添加景区信息" onclick="newwin('GoodsAdd.php')" name=add>
</td>
</tr>
</table>
</body>
</html>