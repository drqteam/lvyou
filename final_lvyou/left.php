<?PHP
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ҳ</title>
</head>
<body>
<table border="0.1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="right"> <a href="Admin/Login.php"  target=_blank><b><font color="#000000">����Ա��˵�¼</font></b></a> </td>
      </tr>  
      <tr>         
          <td width="100%" height="24" bgcolor="E1F5FF" align="center">
			<font color="#856363"><b>·���Ƽ�</b></font></td>  
      </tr>         
<?PHP  
  if(!isset($_SESSION)){
    session_start();
  } 
  include('Class/Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  //��ʾ������Ϣ     
?>
        <tr>         
          <td width="100%" bgcolor="E1F5FF" height="70" valign="top">      
<?PHP  
  $exist = false;
  //��ʱ����ʾ���µ�10��������Ϣ
  for ($i=1; $i<=10; $i++)
  {
	
    if($row = $results->fetch_row())
    {
      $exist = true;
      $title=$row[1];
      //��ʾ���ű����Լ���ҳ����
      if(strlen($title)>1000)
      {
        $title=substr($title,0,1000);
?><a href="BulletinView.php?id=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo $title; ?>����</a>         
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
          <td width="100%" height="70" bgcolor="#E1F5FF">û��·���Ƽ�</td>     
      </tr>             
<?PHP  }
  include('Class/Users.php');
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  $objUser = new Users();
  $UserId=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  //�������ݿ⣬���������֤
  $objUser->GetUsersInfo($UserId);
  $_SESSION["user_name"]=$objUser->Name;
  if($UserId!="" && $objUser->UserPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">�û���Ϣ</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">�û��˺�:<?PHP echo($objUser->UserId); ?><br><br>
				��ϵ��ַ��<?PHP echo($objUser->Address); ?><br>         
                <br>E-mail��<?PHP echo($objUser->Email); ?>
				</td>       
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user/my.html' target="_blank"><b><font color="">�ҵ��û�����</b></a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)"><b><font color="#8E236B">�˳���¼</b></a>
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
		  <b><font color="#000000">�û���¼</font></b></td>
        </tr> 
        <tr>         
          <td width="50%" height="18" bgcolor="#E1F5FF">         
            <table border="0.1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">        
              <tr>         
                <td width="100%" bgcolor="#BC8F8F" height="35" align="center">
                  <b>      
                  <form method="POST" action="putSession.php">         
                    �˺�: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>����: 
                    <input type="password" name="password" size="18" value="">                           
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="��&nbsp;&nbsp;¼" name="B1">
                    &nbsp;&nbsp;
                    <tr>
                                          <td width="100%" bgcolor="#BC8F8F" height="35" align="right">
					  <a href="user/UserAdd.php"  target=_blank><b><font color="#000000">�û�ע��</b></a></td>
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
