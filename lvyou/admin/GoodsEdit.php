<html>
<head>
<title>�༭������Ϣ</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<Script Language="JavaScript">
//��У��
function CheckFlds(){
  if (document.form1.aname.value==""){
   alert("�����뾰�����ƣ�");
   form1.aname.focus;
   return false;
  }
  return true;
}
</Script>
</head>
<body>
<?PHP  
  include('..\Class\Goods.php');
  $gid=intval($_GET["gid"]);
  $obj = new Scenic();
  $obj->GetScenicInfo($gid);
?>

<form action="GoodsSave.php?flag = 0; ?>&action=edit&gid=<?PHP echo($gid); ?>" method=post name=form1 onsubmit="return CheckFlds()">
<center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>�༭������Ϣ</font></td></tr>
<tr><td align=center width=25% bgcolor=#eeeeee>�������ƣ�</td><td>��</td><td align=left><input type=text name=aname value=<?PHP echo($obj->ScenicName); ?>></td></tr>
<tr><td align=center bgcolor=#eeeeee>��    ��</td><td>��</td><td align=left><input type=text name=sprice value="<?PHP echo($obj->Price); ?>"></td></tr>
<tr><td align=center bgcolor=#eeeeee>���ȼ���</td><td>��</td><td align=left><input type=text name=pmode value="<?PHP echo($obj->Priority); ?>"></td></tr>
<tr><td align=center bgcolor=#eeeeee>����������</td><td>��</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><?PHP echo($obj->ScenicDetail); ?></textarea></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee height=30><input name=submit type=submit value=" ȷ �� "></td></tr>
</table>
</form>
</center>
</body>
</html>