<body background="../images/background.jpg">
<script language="javascript">
function BulletinWin(url) {
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
  oth = oth+",width=400,height=300";
  var BulletinWin = window.open(url,"BulletinWin",oth);
  BulletinWin.focus();
  return false;
}
</script>
<div id="search">
<fieldset  style="width:730px; margin:0px auto" >
<legend>搜索推荐路线</legend>
 	<form method="post" id="searchform" action="show_route.php">
 	<div>

	<p>
	<label for="num" class="label">景点个数</label>
	<select name="num">
<option value="1" selected="selected">一</option>
<option value="2">二</option>
<option value="3">三</option>
<option value="4">四</option>
</select>
	</p>
 	<p>
	<label for="sname" class="label">景点名称</label>
	<input id="sname1" name="sname1" type="text" class="input" />
	<input id="sname2" name="sname2" type="text" class="input" />
	<input id="sname3" name="sname3" type="text" class="input" />
	<input id="sname4" name="sname4" type="text" class="input" />
	<span>（按序填好）</span>
	
	</p>
<p>
	<label for="sname" class="label">预算</label>
	<input id="price" name="price" type="text" class="input" />
	</p>
<p>
<input type="submit" name="submit" value="  提交  " class="left" />
</p>
 	</div>
 	</form>
	</fieldset>
 	</div>
	<hr>
	
<?PHP
$num=$_POST['num'];
$array[0]=$_POST['sname1'];
$array[1]=$_POST['sname2'];
$array[2]=$_POST['sname3'];
$array[3]=$_POST['sname4'];
$price=$_POST['price'];

if($price=="")
	$price=1000;
if($num==1&&$array[0]=="")
	{echo '填写错误 <a href="route.html">返回</a>';
	exit;}
if($num==2&&$array[1]=="")
{echo '填写错误 <a href="route.html">返回</a>';
	exit;}
if($num==3&&$array[2]=="")
{echo '填写错误 <a href="route.html">返回</a>';
	exit;}
if($num==4&&$array[3]=="")
{echo '填写错误 <a href="route.html">返回</a>';
	exit;}

  include('../Class/Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->getbullist($num,$array,$price);
  $exist = false;

  
?>
<p align=center><font style='FONT-SIZE:12pt' color="#000080"><b>推 荐 路 线 </b></font></p>
<table align=center border="1" cellspacing="0" width="50%" bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF"style='FONT-SIZE: 9pt' >
  <tr>
   <td width="30%" align="center" bgcolor="#eeeeee"><strong>标题（点击查看内容）</strong></td>
   </tr>
 <?PHP 
  //依次显示公告信息
  while($row = $results->fetch_row())
  {
    $exist = true;
?>
  <tr>
    <td><a href="../BulletinView.php?id=<?PHP echo($row[0]); ?>" onClick="return BulletinWin(this.href)"><?PHP echo($row[1]); ?></a></td>
	</tr>
<?PHP 
  } 
  if (!$exist)
  {
    print "<tr><td colspan=5 align=center>目前还没有推荐路线。</td></tr></table>";
  }
?>
</table>