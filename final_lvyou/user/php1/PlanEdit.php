<body background="../images/background.jpg">
<?PHP 
include('conn.php'); 
$gid=$_GET['gid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>提交计划</title>
  <style type="text/css">
    html{font-size:12px;}
	fieldset{width:520px; margin: 0 auto;}
	legend{font-weight:bold; font-size:14px;}
	label{float:left; width:70px; margin-left:10px;}
	.left{margin-left:80px;}
	.input{width:150px;}
	span{color: #666666;}
  </style>
  
  </head>
	<div id="search">
 	<form name="myForm" method="post" id="searchform" action="update_plan.php?gid=<?PHP echo $gid; ?> ">
 	<div>
         <a href="javascript:;">
      <img src="images/title.jpg" style="width:600px;height:250px;" />
</a>
<div>
 	<p>
	<label for="sname" class="label">景点名称</label>
	<input id="sname" name="sname" type="text" class="input" />
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
<label for="NUM" class="label">同行人数</label>
<input type="radio" name="NUM" value="5" /> 5
<input type="radio" name="NUM" value="10" /> 10
<input type="radio" name="NUM" value="10" /> 15
	</p>
	<p>
	<label for="text" class="label">其他需求</label>
	<textarea name="text" rows="10" cols="40">
</textarea></p>
<p>
<input type="submit" name="submit" value="  提交  " class="left" />
</p>
 	</div>
 	</form>
 	</div>
</html>