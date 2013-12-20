<?PHP
include('isAdmin.php'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>首页推荐路线管理</title>
<link href="../style.css" rel="stylesheet">
<script language="javascript">
function BulletinWin(url) {
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
  oth = oth+",width=400,height=300";
  var BulletinWin = window.open(url,"BulletinWin",oth);
  BulletinWin.focus();
  return false;
}
</script>
</head>
<body link="#000080" vlink="#080080">
<form name="form1" method="POST">
<?PHP
  include('../Class/Bulletin.php');
  //查询表Bulletin中的公告信息
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  $exist = false;
?>
<p align=center><font style='FONT-SIZE:12pt' color="#000080"><b>推 荐 路 线 管 理</b></font></p>
<table align=center border="1" cellspacing="0" width="100%" bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF"style='FONT-SIZE: 9pt' >
  <tr>
   <td width="30%" align="center" bgcolor="#eeeeee"><strong>标题（点击查看内容）</strong></td>
   <td width="30%" align="center" bgcolor="#eeeeee"><strong>修改时间</strong></td>
   <td width="20%" align="center"  bgcolor="#eeeeee"><strong>修改</strong></td>
   <td width="20%" align="center"  bgcolor="#eeeeee"><strong>删除</strong></td>
  </tr>
<?PHP 
  //依次显示公告信息
  while($row = $results->fetch_row())
  {
    $exist = true;
?>
  <tr>
    <td><a href="../BulletinView.php?id=<?PHP echo($row[0]); ?>" onClick="return BulletinWin(this.href)"><?PHP echo($row[1]); ?></a></td>
	<td align="center"><?PHP echo($row[3]); ?></td>
    <td align="center"><a href="BulletinEdit.php?id=<?PHP echo($row[0]); ?>" onClick="return BulletinWin(this.href)">点击这里修改</a></td>
    <td align="center"><a href="BulletinDelt.php?id=<?PHP echo($row[0]); ?>" >删除</a></td>
  </tr>
<?PHP 
  } 
  if (!$exist)
  {
    print "<tr><td colspan=5 align=center>目前还没有推荐路线。</td></tr></table>";
  }
?>
</table>
	<p align="center">
		<input type="button" value="添加推荐路线" onclick="BulletinWin('BulletinAdd.php')" name=add>
		
<br><br>
<input type=hidden name="Bulletin">
</form>
</body>
</html>