<html>
<head>
<title>�༭��Ʒ</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<Script Language="JavaScript">
//��У��
function CheckFlds(){
  if (document.form1.aname.value==""){
   alert("������������ƣ�");
   form1.aname.focus;
   return false;
  }
  var a,b;
  a = document.form1.atype.selectedIndex;
  if(document.form1.atype.value ==0){
    if (form1.anum.value!=1 ){
      alert("������������Ϊ1��");
      form1.anum.value = 1;
      return false;
    }
  }
  return true;
}
</Script>
</head>
<body>
<?PHP  
  include('..\Class\Goods.php');
  $gid=intval($_GET["gid"]);
  $obj = new Goods();
  $obj->GetGoodsInfo($gid);
  //��ȡ������Ϣ
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //��ȡ��Ʒ����
  include('..\Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
?>

<form action="GoodsSave.php?flag=<?PHP echo($obj->SaleOrBuy-1); ?>&action=edit&gid=<?PHP echo($gid); ?>" method=post name=form1 onsubmit="return CheckFlds()">
<center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	�༭��Ʒ��Ϣ</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>��Ʒ���ƣ�</td><td>��</td><td align=left><input type=text name=aname value=<?PHP echo($obj->GoodsName); ?>></td></tr>
<tr><td align=right bgcolor=#eeeeee>�� �� �ߣ�</td><td>��</td><td align=left><input type=text name=ownerid value=<?PHP echo($objUser->Name); ?> readonly></td></tr>
<tr><td align=right bgcolor=#eeeeee>�������ࣺ</td><td>��</td><td align=left>
<select size="1" name="typeid">
<?PHP  
  $tid=intval($_POST["tid"]);
  $objType1 = new GoodsType();
  $results = $objType1->GetGoodsTypelist();
  while($row = $results->fetch_row())
  {
?>
	<option value="<?PHP echo($row[0]); ?>" <?PHP if($row[0]==$objGoods->TypeId)
  {
?> 
	selected 
<?PHP    
  } 
?>
    ><?PHP echo($row[1]); ?></option>  
<?PHP   
  } 
?>  
</select>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>���ʱ�䣺</td><td>��</td><td align=left>
	<input type=text name=stime value="<?PHP echo($obj->StartTime); ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ�۸�</td><td>��</td><td align=left><input type=text name=sprice value="<?PHP echo($obj->Price); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>�¾ɳ̶ȣ�</td><td>��</td><td align=left><input type=text name=oldnew value="<?PHP echo($obj->OldNew); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>�������ޣ�</td><td>��</td><td align=left><input type=text name=repaired value="<?PHP echo($obj->Repaired); ?>"> </td></tr>
<tr><td align=right bgcolor=#eeeeee>������Ʊ��</td><td>��</td><td align=left><input type=text name=invoice value="<?PHP echo($obj->Invoice); ?>"> </td></tr>
<tr><td align=right bgcolor=#eeeeee>�ˡ����ѣ�</td><td>��</td><td align=left><input type=text name=carriage value="<?PHP echo($obj->Carriage); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>֧����ʽ��</td><td>��</td><td align=left><input type=text name=pmode value="<?PHP echo($obj->PayMode); ?>"></td></tr>
<tr>
	<td align=right bgcolor=#eeeeee>�ͻ���ʽ��</td><td>��</td><td align=left><input type=text name=dmode value="<?PHP echo($obj->DeliverMode); ?>"></td>
</tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ������</td><td>��</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><?PHP echo($obj->GoodsDetail); ?></textarea></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee height=30><input name=submit type=submit value=" ȷ �� "></td></tr>
</table>
</form>
</center>
</body>
</html>