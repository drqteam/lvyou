<body background="../images/background.jpg">
<?PHP 
include('conn.php'); 
$gid=$_GET['gid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�ύ�ƻ�</title>
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
	<label for="sname" class="label">��������</label>
	<input id="sname" name="sname" type="text" class="input" />
	<span>(����)</span>
	</p>
<p>
<label for="time" class="label">ʱ��</label>
<select name="year">
<option value="2013" selected="selected">2013��</option>
<option value="2014">2014��</option>
<option value="2015" >2015��</option>
<option value="2016">2016��</option>
</select>

<select name="month">
<option value="1">1��</option>
<option value="2">2��</option>
<option value="3">3��</option>
<option value="4">4��</option>
<option value="5">5��</option>
<option value="6">6��</option>
<option value="7">7��</option>
<option value="8">8��</option>
<option value="9">9��</option>
<option value="10">10��</option>
<option value="11">11��</option>
<option value="12">12��</option>

</select>

<select name="day">
<option value="1">1��</option>
<option value="2">2��</option>
<option value="3">3��</option>
<option value="4">4��</option>
<option value="5">5��</option>
<option value="6">6��</option>
<option value="7">7��</option>
<option value="8">8��</option>
<option value="9">9��</option>
<option value="10">10��</option>
<option value="11">11��</option>
<option value="12">12��</option>
<option value="13">13��</option>
<option value="14">14��</option>
<option value="15">15��</option>
<option value="16">16��</option>
<option value="17">17��</option>
<option value="18">18��</option>
<option value="19">19��</option>
<option value="20">10��</option>
<option value="21">21��</option>
<option value="22">22��</option>
<option value="23">23��</option>
<option value="24">24��</option>
<option value="25">25��</option>
<option value="26">26��</option>
<option value="27">27��</option>
<option value="28">28��</option>
<option value="29">29��</option>
<option value="30">30��</option>
<option value="31">31��</option>
</select>
</p>
 	<p>
<label for="NUM" class="label">ͬ������</label>
<input type="radio" name="NUM" value="5" /> 5
<input type="radio" name="NUM" value="10" /> 10
<input type="radio" name="NUM" value="10" /> 15
	</p>
	<p>
	<label for="text" class="label">��������</label>
	<textarea name="text" rows="10" cols="40">
</textarea></p>
<p>
<input type="submit" name="submit" value="  �ύ  " class="left" />
</p>
 	</div>
 	</form>
 	</div>
</html>