<?PHP 
include('isAdmin.php'); 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
<link rel="stylesheet" href="../style.css">
<script language="javascript">
function form_onsubmit(obj) 
{   
  ValidationPassed = true;  
  if(obj.ClsId.selectedIndex <0) {
    alert("��ѡ��һ������");
    ValidationPassed = false;
    return ValidationPassed;
  }    
  if(obj.txttitle.value == "") {
    alert("�������������");
    ValidationPassed = false;
    return ValidationPassed;
  }    
}
function form_onsubmit1(obj) 
{   
  ValidationPassed = true;  
  if(obj.txttitle.value == "") {
    alert("�������������");
    ValidationPassed = false;
    return ValidationPassed;
  }    
}
</script>
</head>
<body link="#000080" vlink="#080080">
<form id="form1" name="form1" method="POST">
<?PHP 
  include('..\Class\GoodsType.php');
  include('..\Class\Goods.php');
  $objType = new GoodsType();
  $objGoods = new Goods();
  //������ӡ��޸ĺ�ɾ������
  $Soperate=$_GET["Oper"];
  $Operid=$_GET["tid"];
  //ɾ��
  if($Soperate=="delete")
  {
    //�ж���Ʒ�����Ƿ���ڴ˷���
    if ($objGoods->HaveGoodsType($Operid))
    {
      exit("�˷��������Ʒ��Ϣ������ɾ����");
    } 

    $objType->delete($Operid);
    exit("�����Ѿ��ɹ�ɾ����");
  }
  elseif ($Soperate=="add")   //���
  {
    $Name=$_POST["txttitle"];
    //�ж��Ƿ��Ѿ����ڴ˷�������
    if($objType->HaveGoodsType($Name))
    {
      echo("�Ѿ����ڴ˷������ƣ�");
    }
    else
    {
      $objType->TypeName=$Name;
      $objType->insert();
    } 

  }
  elseif ($Soperate=="edit")
  {
    $Name=$_POST["txttitle"];
    //�ж��Ƿ��Ѿ����ڴ˷�������
    if ($objType->HaveGoodsType($Name))
    {
      echo("�Ѿ����ڴ˷������ƣ�");
    }
    else
    {
      $objType->TypeName=$Name;
      $objType->update($Operid);
    } 
  } 
?>
<p align='center'><font style="FONT-SIZE: 12pt"><b>�� Ʒ �� �� �� ��</b></font></p>
<center>
<table border="1" cellspacing="0" width="90%"   bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
  <tr>
    <td width="30%" align="center" bgcolor="#eeeeee"><strong>��������</strong></td>
    <td width="20%" align="center" bgcolor="#eeeeee"><strong>�� ��</strong></td>
    <td width="20%" align="center" bgcolor="#eeeeee"><strong>ɾ ��</strong></td>
  </tr>
<?PHP 
  //��ȡ��������
  $results = $objType->GetGoodsTypelist();
  $exist = false;
  //�ڱ������ʾ��������
  while($row = $results->fetch_row())
  {
	  $exist = true;
?>
  <tr>
    <td><?PHP echo($row[1]); ?></td>
    <td align="center"><a href="TypeList.php?Oper=update&tid=<?PHP echo($row[0]); ?>&name=<?PHP echo($row[1]); ?>">�� ��</a></td>
    <td align="center"><a href="TypeList.php?Oper=delete&tid=<?PHP  echo($row[0]); ?>&name=<?PHP  echo($row[1]); ?>">ɾ ��</a></td>
  </tr>
<?PHP  
  } 
?>
</table>
		<p align="center">	
<?PHP  
  if(!$exist)  //�����¼��Ϊ�գ�����ʾ��Ŀǰ��û�м�¼��
  {
    echo("<tr><td colspan=4 align=center><font style='COLOR:Red'>Ŀǰ��û�м�¼��</font></td></tr></table>");
  }
?>
</form>
<?PHP  
  //�����ǰ״̬Ϊ�޸ģ�����ʾ�޸ĵı���������ʾ��ӵı�
  if($Soperate=="update")
  {
    $sTitle=$_GET["name"];
?>
    <form name="UFrom" method="post" action="TypeList.php?tid=<?PHP  echo($Operid); ?>&Oper=edit">
	  <div align="center">
		<input type="hidden" name="sOrgTitle" value="<?PHP    echo($sTitle); ?>">
		<font color="#FFFFFF"><b><font color="#000000">��������</font></b></font> 
		<input type="text" name="txttitle" size="20" value="<?PHP    echo($sTitle); ?>">
		<input type="submit" name="Submit" value=" �� �� ">
		</div>
	</form>
<?PHP  }
  else
  {
?>
<form name="AForm" method="post" action="TypeList.php?Oper=add">
  <p align="center">
	<font color="#FFFFFF"><b><font color="#000000">��ӷ��ࣺ</font></b></font> 
	&nbsp;&nbsp;�������ƣ�&nbsp;&nbsp;<input type="text" name="txttitle" size="20">
	<input type="hidden" name="sUpperId" value="0">&nbsp;&nbsp;
	<input type="submit" name="Submit" value=" �� �� " onclick="return form_onsubmit1(this.form)">
  </p>
</form>
<?PHP  
  } 
?>
</body>
</html>