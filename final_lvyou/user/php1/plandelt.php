<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<?PHP  
  //从数据库中批量删除信息
  //读取要删除的编号
  session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}

//包含数据库连接文件
include('conn.php');
  $gid=$_GET["gid"];
  mysql_query("delete from commonder where id = '$gid'  ") or die("删除时出错");
  print "删除成功!";
?>

</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>