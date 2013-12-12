<html>
<head>
<title>查看景点信息</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<?PHP 
  include('Class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Scenic();
  $obj->Add_ClickTimes($gid);  // 增加点击次数
  $obj->GetScenicInfo($gid);  // 获取商品信息
  include('Class\Users.php');
  //读取卖家信息
  //读取商品类型
?>
<center><?PHP if($obj->ImageURL=="")
{
?>
	<img src="images/noImg.jpg" height=50 border=0>
<?PHP 
}
  else
{
?>
	<img src="user/images/<?PHP   echo($obj->ImageURL); ?>" height=50 border=0>
<?PHP 
} 
?>
</center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	景点信息</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>景点名称：</td><td align=left><?PHP echo($obj->ScenicName); ?></td></tr>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>景点价格：</td><td align=left><?PHP echo($obj->Price); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>开门时间：</td><td align=left><?PHP echo($obj->StartTime); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>优 先 级：</td><td align=left><?PHP echo($obj->Priority); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>景点描述：</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><?PHP echo($obj->ScenicDetail); ?></textarea></td></tr>
</table>
</form>
</center>
</body>
</html>