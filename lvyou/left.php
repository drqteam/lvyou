<?PHP
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>首页</title>
</head>
<body>
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
      <tr>         
          <td width="100%" height="24" bgcolor="#63CFFF" align="center">
			<font color="#FF0000"><b>站内公告</b></font></td>  
      </tr>         
<?PHP  
  session_start();
  include('Class\Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  //显示新闻信息     
?>
        <tr>         
          <td width="100%" bgcolor="#E1F5FF" height="70" valign="top">      
<?PHP  
  $exist = false;
  //按时间显示最新的10条新闻信息
  for ($i=1; $i<=10; $i++)
  {
	$exist = true;
    if($row = $results->fetch_row())
    {
      $title=$row[1];
      //显示新闻标题以及网页链接
      if(strlen($title)>11)
      {
        $title=substr($title,0,11);
?><a href="BulletinView.php?id=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo $title; ?>……</a>         
<?PHP      
	  }
      else
      {
?>            
         <a href="BulletinView.php?id=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo($title); ?></a> 
 <?PHP      
      } 
?><br> 
<?PHP    
   }  
?>
         </td>         
        </tr>
<?PHP  }  
       if(!$exist)
       {
?>         
      <tr>         
          <td width="100%" height="70" bgcolor="#E1F5FF">暂且没有公告 </td>     
      </tr>             
<?PHP  }
  include('Class\Users.php');
  //从Session变量中读取注册用户信息，并连接到数据库验证
  $objUser = new Users();
  $UserId=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  //连接数据库，进行身份验证
  $objUser->GetUsersInfo($UserId);
  $_SESSION["user_name"]=$objUser->Name;
  if($UserId!="" && $objUser->UserPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">用户信息</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">用户账号:<?PHP echo($objUser->UserId); ?><br>
				居住公寓：<?PHP echo($objUser->Address); ?><br>         
                <br>手机号码：<?PHP echo($objUser->Phone); ?>
				</td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user\UserView.php?uid=<?PHP echo($objUser->UserId); ?>' target="_blank">我的商品</a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)">退出登录</a>
                </td>         
              </tr>     
            </table>         
          </td>         
        </tr> 
<?PHP  
  }
  else
{
?>
		<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="center"> <a href="Admin/Login.php"  target=_blank><b><font color="#000000">管理员</font></b></a> </td>
        </tr>  
		<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="center"> <a href="index.php"  target=_blank>
		  <b><font color="#000000">用 户</font></b></a> </td>
        </tr> 
        <tr>         
          <td width="100%" height="18" bgcolor="#E1F5FF">         
            <table border="0" cellspacing="1" height="58">         
              <tr>         
                <td width="100%" bgcolor="#E1F5FF" height="35">         
                  <form method="POST" action="putSession.php">         
                    账号: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>密码: 
                    <input type="password" name="password" size="18" value="">                            
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="登&nbsp;&nbsp;录" name="B1">
                    &nbsp;&nbsp;
                    <tr>
					  <td align="center"> <a href="user/UserAdd.php"  target=_blank>用户注册</a></td>
					</tr>
                  </form>         
                </td>         
              </tr>         
            </table>         
          </td>         
        </tr>         
      <?PHP  } ?>  
      </table>
<?php
include('Class\Goods.php');
?>
	  </body>
</html>
