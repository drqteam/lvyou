<?PHP
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  include('isUser.php'); 
  session_start();
?>
<html>
<head>
<title>保存商品信息</title>
</head>
<body>
<?PHP  	
  //得到动作参数，如果为add则表示添加操作，如果为edit则表示更改操作
  $StrAction=$_GET["action"];
  // 定义Goods对象，保存商品数据
  include('..\Class\Goods.php');
  $obj = new Goods();
  $obj->GoodsName=$_POST["aname"];
  $obj->TypeId=$_POST["typeid"];
  $obj->GoodsDetail=$_POST["adetail"];
  $obj->Price=$_POST["sprice"];
  $obj->StartTime=$_POST["stime"];
  $obj->PayMode=$_POST["pmode"];
  $obj->DeliverMode=$_POST["dmode"];
  if ($StrAction=="edit")
  {
    $gid=$_GET["gid"];
    $obj->update($gid);
  }
  else
  {
    $obj->ImageUrl=$_POST["goodsimage"];
    $obj->insert();
  }
  print "<h3>商品信息成功保存</h3>" ;
?>
</body>
<script language="javascript">
  // 刷新父级窗口，延迟此关闭
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>