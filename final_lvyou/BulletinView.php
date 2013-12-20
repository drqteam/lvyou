<html>
<body background="images/background.jpg">
<head>
<title>旅游路线推荐</title>
<link href=style.css rel=STYLESHEET type=text/css>
<script language="javascript">
  function checkFields()
  {
    if (myform.title.value=="") {
       alert("题目不能为空");
       myform.title.onfocus();
       return false;
    }
    if (myform.content.value=="") {
       alert("内容不能为空");
       myform.content.onfocus();
       return false;
    }
    return true;
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><style type="text/css">
<!--
body,td,th {
	color: #D4D0C8;
}
body {
	background-color: #FFFFFF;
}
.STYLE1 {color: #000000}
-->
</style></head>
<body>

<?PHP
  include('Class/Bulletin.php');
  //从数据库中取得此公告信息
  //读取参数id
  $id=$_GET["id"];
  //根据参数id读取指定的公告信息
  $obj = new Bulletin();
  $results = $obj->GetBulletinInfo($id);
  //如果记录集为空，则显示没有此公告
  if($obj->Id==0)
  {
    exit("没有此内容");
  }
  else
  {
?>
<form name="myform" method="POST" action="BulletinSave.asp?action=update&id=<?PHP echo $id; ?>" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">标题
            <input type="text" readonly="true" name="title" size="20" value="<?PHP echo($obj->Title); ?>">
            </span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">旅游内容</span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><textarea rows="12" readonly="readonly" name="content" cols="55"><?PHP  echo($obj->Content); ?></textarea></td>
          </tr>
  </table>
<?PHP  
} 
?>
</form>
<?PHP 
$obj=null;
?>
</body>
</html>