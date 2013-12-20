<?PHP
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>首页</title>
</head>
<body>
<table border="0.1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="right"> <a href="Admin/Login.php"  target=_blank><b><font color="#000000">管理员点此登录</font></b></a> </td>
      </tr>  
      <tr>         
          <td width="100%" height="24" bgcolor="E1F5FF" align="center">
			<font color="#856363"><b>路线推荐</b></font></td>  
      </tr>         
<?PHP  
  if(!isset($_SESSION)){
    session_start();
  } 
  include('Class/Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  //显示新闻信息     
?>
        <tr>         
          <td width="100%" bgcolor="E1F5FF" height="70" valign="top">      
<?PHP  
  $exist = false;
  //按时间显示最新的10条新闻信息
  for ($i=1; $i<=10; $i++)
  {
	
    if($row = $results->fetch_row())
    {
      $exist = true;
      $title=$row[1];
      //显示新闻标题以及网页链接
      if(strlen($title)>1000)
      {
        $title=substr($title,0,1000);
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
         
<?PHP  }
       if(!$exist)
       {
?>         
      <tr>         
          <td width="100%" height="70" bgcolor="#E1F5FF">没有路线推荐</td>     
      </tr>             
<?PHP  }
  include('Class/Users.php');
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
                <td width="100%" bgcolor="#E1F5FF">用户账号:<?PHP echo($objUser->UserId); ?><br><br>
				联系地址：<?PHP echo($objUser->Address); ?><br>         
                <br>E-mail：<?PHP echo($objUser->Email); ?>
				</td>       
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user/my.html' target="_blank"><b><font color="">我的用户中心</b></a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)"><b><font color="#8E236B">退出登录</b></a>
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
		  <td width="50%" bgcolor="#00FF7F" height="24" align="center">
		  <b><font color="#000000">用户登录</font></b></td>
        </tr> 
        <tr>         
          <td width="50%" height="18" bgcolor="#E1F5FF">         
            <table border="0.1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">        
              <tr>         
                <td width="100%" bgcolor="#BC8F8F" height="35" align="center">
                  <b>      
                  <form method="POST" action="putSession.php">         
                    账号: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>密码: 
                    <input type="password" name="password" size="18" value="">                           
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="登&nbsp;&nbsp;录" name="B1">
                    &nbsp;&nbsp;
                    <tr>
                                          <td width="100%" bgcolor="#BC8F8F" height="35" align="right">
					  <a href="user/UserAdd.php"  target=_blank><b><font color="#000000">用户注册</b></a></td>
					</tr>
                  </form>  
                  </b>       
                </td>         
              </tr>         
            </table>         
          </td>         
        </tr>         
      <?PHP  } ?>  
      </table>
<?php
include('Class/Goods.php');
?>
	  </body>
</html>
