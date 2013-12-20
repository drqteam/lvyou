<?PHP 
include('isUser.php'); 
?>
<html>
<head>
<title>编辑日志</title>
<link href=../style.css rel=STYLESHEET type=text/css>
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
  //从数据库中取得此公告信息
  //读取参数id
  $id=$_GET["id"];
  //根据参数id读取指定的公告信息
  include('../Class/Diary.php');
  $obj = new Diary();
  $obj->GetBulletinInfo($id);
  //如果记录集为空，则显示没有此公告
  if($obj->Id==0)
  {
    exit("没有该日志");
  }
  else
  {
  //下面内容是在表格中显示公告内容
?>
<form name="myform" method="POST" action="BulletinSave.php?action=update&id=<?PHP echo($id); ?>" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">日志标题
            <input type="text" name="title" size="20" value="<?PHP echo($obj->Title); ?>">
            </span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><span class="STYLE1">日志内容</span></td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#FFFFFF"><textarea rows="12" name="content" cols="55"><?PHP echo($obj->Content); ?></textarea></td>
          </tr>
  </table>
        <p align="center"><input type="submit" value=" 提 交 " name="B1">
        <input type="reset" value=" 重写 " name="B2"></p>
<?PHP 
} 
?>
</form>
</body>
</html>