<?PHP 
ob_start(); 
error_reporting(0);
?>
<html>
<head>
<?PHP 
session_start(); 
?>
<link href=style.css rel=STYLESHEET type=text/css>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><title>¿�Ѹ���ϵͳ</title></head>
<body>
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td colspan="3" height="80"><img src="images/title.jpg" width="800" height="100" border="0"></td>
 </tr>
  <tr>
  <td colspan="2" bgcolor="#E1F5FF" height="19" valign="middle" align="left">
 
<?PHP
  //�ӱ�GoodsType�ж�ȡ��Ʒ�������
  include('Class\GoodsType.php');
  $gtype = new GoodsType();
  $results = $gtype->GetGoodsTypelist();
  //ʹ��ѭ�����,������ʾ������Ϣ
?>
<b><font face="����" size="2" color="#000000">����·��</font></b>
<?PHP
  while($row = $results->fetch_row())
  {  
?>
      <font color="#FF9933"> </font>&nbsp;<a href="List.php?tid=<?PHP echo($row[0]); ?>" target="_blank"><?PHP  echo($row[1]); ?></a>&nbsp;
<?PHP 
  } 
?>
  </td>  
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="right">
  </td></tr>
<tr><td width="25%" valign="top" align="left"><?PHP include("left.php"); ?></td>
<td width="75%" valign="top" align="center">
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">

<tr><td align=right width="25%" bgcolor="#63CFFF">��&nbsp;&nbsp;��</td><td>
</td><td align=left bgcolor="#63CFFF"><input type=text name=aname></td></tr>

<tr><td width="50%" bgcolor="#63CFFF" height="18">���ž���</td></tr>
<tr><td width="100%" valign="top" align="left" height="1">
<table border="1" width="100%"  cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">
<tr>
<?PHP  
//  include('Class\Goods.php');
  $objGoods = new Goods();
  $results = $objGoods->GetTopnNewGoods(12);
  //���û���ҵ���Ʒ������ʾ��ʾ��Ϣ
  $i=0;
  //����ʹ��ѭ����䣬������ʾ��Ʒ��Ϣ
  while($row = $results->fetch_row())
  {
?>        
    <td valign="top" width="33.33%" align="left" bgcolor="#FFFFFF">
    <p align="center">
<?PHP  
//��ʾ��ƷͼƬ
  if (!isset($row[5]) || trim($row[5])=="")
  {
?>
      <img border="0" src="images/noImg.jpg" height="110">
<?PHP 
  }
  else
  {
?>
      <a href="GoodsView.php?gid=<?PHP echo($row[0]); ?>" target=_blank>
      <img border="0" src="user/images/<?PHP echo($row[5]); ?>" width="100" height="110"></a>
<?PHP 
  } 
?>
</center>
    <br>��Ʒ���ƣ�<a href="GoodsView.PHP?gid=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo($row[3]); ?></a>
	<br>�������ͣ�
<?PHP 
	if($row[2]==1)
  {
?>
       ת��
<?PHP    
	}
    else
    {
?>
	   ��
<?PHP   
	} 
?>
    <br>�����ߣ�<?PHP echo($row[15]); ?>
    <br>�۸�<?PHP echo($row[6]); ?>Ԫ
    <br>����ʱ�䣺<?PHP echo($row[7]); ?>
</td>
<center>
<?PHP  
  if ($i%3==2)
  {
?>
	  </tr><tr>
<?PHP 
  } 
  $i++;
} 
  if ($i==0)
  {
?>
   <td width="100%" valign="top" align="left" bgcolor="#FFFFFF">����û����Ʒ</td>
<?PHP  
} 
?>
</tr></table></center></table></td>    
  </tr>
</table>
</body>
</html>