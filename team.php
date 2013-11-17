<?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}





//包含数据库连接文件
include('conn.php');

$uid=$_SESSION['userid'];
$check_query = mysql_query("select comnum, sname,time from commonder where pid =  '$uid'  ");

if($result = mysql_fetch_array($check_query)){

	echo $result['sname'], '  同行人数上限 ：' ,$result['comnum'] ,' ', date("Y-m-d", $result['time']),'<br />';}

 else {
	exit('查询失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}

while($result = mysql_fetch_array($check_query)){
	echo $result['sname'],  '  同行人数上限 ：'  ,$result['comnum'] ,' ', date("Y-m-d", $result['time']),'<br />';
}
	echo <<<STR
	<div id="search">
 	<form method="post" id="searchform" action="show_teammate.php">
 	<div>
 	<p>
	<label for="sname" class="label">景点名称</label>
	<input id="sname" name="sname" type="text" class="input" />
	<span>(必填)</span>
	</p>
	
	<p>
	<label for="num" class="label">同行人数不超过</label>
	<input id="num" name="num" type="text" class="input" />
	<span>(必填)</span>
	</p>
<p>
<label for="time" class="label">时间</label>
<select name="year">
<option value="2013" selected="selected">2013年</option>
<option value="2014">2014年</option>
<option value="2015" >2015年</option>
<option value="2016">2016年</option>
</select>

<select name="month">
<option value="1">1月</option>
<option value="2">2月</option>
<option value="3">3月</option>
<option value="4">4月</option>
<option value="5">5月</option>
<option value="6">6月</option>
<option value="7">7月</option>
<option value="8">8月</option>
<option value="9">9月</option>
<option value="10">10月</option>
<option value="11">11月</option>
<option value="12">12月</option>

</select>

<select name="day">
<option value="1">1日</option>
<option value="2">2日</option>
<option value="3">3日</option>
<option value="4">4日</option>
<option value="5">5日</option>
<option value="6">6日</option>
<option value="7">7日</option>
<option value="8">8日</option>
<option value="9">9日</option>
<option value="10">10日</option>
<option value="11">11日</option>
<option value="12">12日</option>
<option value="13">13日</option>
<option value="14">14日</option>
<option value="15">15日</option>
<option value="16">16日</option>
<option value="17">17日</option>
<option value="18">18日</option>
<option value="19">19日</option>
<option value="20">10日</option>
<option value="21">21日</option>
<option value="22">22日</option>
<option value="23">23日</option>
<option value="24">24日</option>
<option value="25">25日</option>
<option value="26">26日</option>
<option value="27">27日</option>
<option value="28">28日</option>
<option value="29">29日</option>
<option value="30">30日</option>
<option value="31">31日</option>
</select>
</p>
<p>
<input type="submit" name="submit" value="  提交  " class="left" />
</p>
 	</div>
 	</form>
 	</div>
STR;
	exit;

?>