<?PHP
include('isAdmin.php'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
<link href="../style.css" rel="stylesheet">
<script language="javascript">
function BulletinWin(url) {
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
  oth = oth+",width=400,height=300";
  var BulletinWin = window.open(url,"BulletinWin",oth);
  BulletinWin.focus();
  return false;
}
function SelectChk()
{
  var s = false; //������¼�Ƿ���ڱ�ѡ�еĸ�ѡ��
  var Bulletinid, n=0; 
  var strid, strurl;
  var nn = self.document.all.item("Bulletin"); //���ظ�ѡ��Bulletin������
  for (j=0; j<nn.length; j++) {
    if (self.document.all.item("Bulletin",j).checked) {
      n = n + 1;
      s = true;
      Bulletinid = self.document.all.item("Bulletin",j).id+"";  //ת��Ϊ�ַ���
      //����Ҫɾ�������ŵ��б�
      if(n==1) {
        strid = Bulletinid;
      }
      else {
        strid = strid + "," + Bulletinid;
      }
    }
  }
  strurl = "BulletinDelt.php?id=" + strid;
  if(!s) {
    alert("��ѡ��Ҫɾ���Ĺ���!");
    return false;
  }	
  if (confirm("��ȷ��Ҫɾ����Щ������")) {
    form1.action = strurl;
	form1.submit();
  }
}

function sltAll()
{
	var nn = self.document.all.item("Bulletin");
	for(j=0;j<nn.length;j++)
	{
		self.document.all.item("Bulletin",j).checked = true;
	}
}
function sltNull()
{
	var nn = self.document.all.item("Bulletin");
	for(j=0;j<nn.length;j++)
	{
		self.document.all.item("Bulletin",j).checked = false;
	}
}
</script>
</head>
<body link="#000080" vlink="#080080">
<form name="form1" method="POST">
<?PHP
  include('..\Class\Bulletin.php');
  //��ѯ��Bulletin�еĹ�����Ϣ
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  $exist = false;
?>
<p align=center><font style='FONT-SIZE:12pt' color="#000080"><b>�� �� �� ��</b></font></p>
<table align=center border="1" cellspacing="0" width="100%" bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF" style='FONT-SIZE: 9pt'>
  <tr>
   <td width="50%" align="center" bgcolor="#eeeeee"><strong>��Ŀ</strong></td>
   <td width="30%" align="center" bgcolor="#eeeeee"><strong>ʱ��</strong></td>
   <td width="10%" align="center"  bgcolor="#eeeeee"><strong>�޸�</strong></td>
   <td width="10%" align="center"  bgcolor="#eeeeee"><strong>ѡ��</strong></td>
  </tr>
<?PHP 
  //������ʾ������Ϣ
  while($row = $results->fetch_row())
  {
    $exist = true;
?>
  <tr>
    <td><a href="../BulletinView.php?id=<?PHP echo($row[0]); ?>" onClick="return BulletinWin(this.href)"><?PHP echo($row[1]); ?></a></td>
	<td align="center"><?PHP echo($row[3]); ?></td>
    <td align="center"><a href="BulletinEdit.php?id=<?PHP echo($row[0]); ?>" onClick="return BulletinWin(this.href)">�޸�</a></td>
    <td align="center"><input type="checkbox" name="Bulletin" id="<?PHP echo($row[0]); ?>" style="font-size: 9pt"></td>
  </tr>
<?PHP 
  } 
  if (!$exist)
  {
    print "<tr><td colspan=5 align=center>Ŀǰ��û�й��档</td></tr></table>";
  }
?>
</table>
	<p align="center">
		<input type="button" value="��ӹ���" onclick="BulletinWin('BulletinAdd.php')" name=add>
		 &nbsp;&nbsp;<input type="button" value="ȫ ѡ" onclick="sltAll()" name=button1>
		 &nbsp;&nbsp;<input type="button" value="�� ��" onclick="sltNull()" name=button2>
 		 &nbsp;&nbsp;<input type="submit" value="ɾ ��" name="tijiao" onclick="SelectChk()">
<br><br>
<input type=hidden name="Bulletin">
</form>
</body>
</html>