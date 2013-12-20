<div>
<fieldset>
<legend>景点搜索</legend>
<form name="RegForm" method="post" action="visit.php" onSubmit="return InputCheck(this)">
<p>
<label for="prize" class="label">旅游预算</label>
<input id="prize" name="prize" type="text" class="input" />
</p>
<p>
<label for="prize" class="label">景点名</label>
<input id="name" name="name" type="text" class="input" />

</p>

<p>
<input type="submit" name="submit" value="  搜索 " class="left" />
</p>
</form>
</fieldset>
</div>
<hr>
<body background="../images/background.jpg">
<?php
session_start();
include('config.php');

error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user_id'])){
	header("Location:../index.php");
	exit();
}


if(!isset($_POST['submit'])){
	exit('非法访问!');
}


$pay = $_POST['prize'];
if($pay=="")
	$pay=1000000;
$name = $_POST['name'];
//包含数据库连接文件
$conn = @mysql_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS); 
if (!$conn){
	die("连接数据库失败：" . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $conn);

mysql_query('SET NAMES utf8');
$check_query1 = mysql_query("select ScenicId,ImageURL,ScenicName,ScenicDetail,Price from Scenic  where ScenicName like '%$name%' and  not Price >'$pay'  order by Priority");
$result = mysql_fetch_array($check_query1);
if(!$result){exit("无此景点！");

}

 else {
	echo'
<table border=2  width=50% align="left">';
echo'<TR>',
'<TD>',
'<TH >', '景点图片 ','</TH>',
'<TH width=20%>', '景点名称 ','</TH>',
'<TH >', '花费 ','</TH>',
'</TD>','</TR>';

do
{echo '<TR>',
'<TD>',
'<TH>'; ?>
<img src="images/<?php echo $result['ImageURL'];?>" height=50 border=0>
<?php
echo '</TH>','</TD>';

$add=DISCUZ_ROOT."GoodsView.php?gid=".$result['ScenicId']; ?>
<td align=center><a href="../GoodsView.php?gid=<?PHP   echo $result['ScenicId']; ?>" target=_blank><?PHP   echo $result['ScenicName']; ?></a></td>
<?php
echo 
'<TH>',$result['Price'] ,'</TH>',

'</TR>';

}
while($result = mysql_fetch_array($check_query1));

echo '</table>' ;
}
?>	




