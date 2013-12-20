<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>景点添加</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<script language="javascript">
  function checkFields()
  {
    if (myform.aname.value=="") {
       alert("景点名称不能为空");
       myform.title.onfocus();
       return false;
    }
    return true;
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<body>
<form name="myform" method="POST" action="GoodsSave.php?action=add" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%">景点名称
            <input type="text" name="aname" size="20"></td>
          </tr>
          <tr>
            <td width="100%">景点门票
            <input type="text" name="sprice" size="20"></td>
          </tr>
          <tr>
            <td width="100%">开门时间
            <input type="text" name="stime" size="20"></td>
          </tr>
          <tr>
            <td width="100%">优 先 级
            <input type="text" name="pmode" size="20"></td>
          </tr>
          <tr>
            <td width="100%">图片链接
            <input type="text" name="url" size="20"></td>
          </tr>
          <tr>
            <td width="100%">景点介绍</td>
          </tr>
          <tr>
            <td width="100%"><textarea rows="12" name="adetail" cols="55"></textarea></td>
          </tr>
        </table>
        <p align="center"><input type="submit" value=" 提 交 " name="B1">
        <input type="reset" value=" 重写 " name="B2"></p>
</form>
</body>
</html>