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
<legend>�����Ƽ�·��</legend>
 	<form method="post" id="searchform" action="show_route.php">
 	<div>

	<p>
	<label for="num" class="label">�������</label>
	<select name="num">
<option value="1" selected="selected">һ</option>
<option value="2">��</option>
<option value="3">��</option>
<option value="4">��</option>
</select>
	</p>
 	<p>
	<label for="sname" class="label">��������</label>
	<input id="sname1" name="sname1" type="text" class="input" />
	<input id="sname2" name="sname2" type="text" class="input" />
	<input id="sname3" name="sname3" type="text" class="input" />
	<input id="sname4" name="sname4" type="text" class="input" />
	<span>��������ã�</span>
	
	</p>
<p>
	<label for="sname" class="label">Ԥ��</label>
	<input id="price" name="price" type="text" class="input" />
	</p>
<p>
<input type="submit" name="submit" value="  �ύ  " class="left" />
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
	{echo '��д���� <a href="route.html">����</a>';
	exit;}
if($num==2&&$array[1]=="")
{echo '��д���� <a href="route.html">����</a>';
	exit;}
if($num==3&&$array[2]=="")
{echo '��д���� <a href="route.html">����</a>';
	exit;}
if($num==4&&$array[3]=="")
{echo '��д���� <a href="route.html">����</a>';
	exit;}

  include('../Class/Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->getbullist($num,$array,$price);
  $exist = false;

  
?>
<p align=center><font style='FONT-SIZE:12pt' color="#000080"><b>�� �� · �� </b></font></p>
<table align=center border="1" cellspacing="0" width="50%" bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF"style='FONT-SIZE: 9pt' >
  <tr>
   <td width="30%" align="center" bgcolor="#eeeeee"><strong>���⣨����鿴���ݣ�</strong></td>
   </tr>
 <?PHP 
  //������ʾ������Ϣ
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
    print "<tr><td colspan=5 align=center>Ŀǰ��û���Ƽ�·�ߡ�</td></tr></table>";
  }
?>
</table>