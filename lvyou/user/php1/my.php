<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION["user_id"])){
	header("Location:index.php");
	exit();
}

//�������ݿ������ļ�
include('conn.php');
  $UserId=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
$user_query = mysql_query("select * from user where uid= $UserId limit 1");
$row = @mysql_fetch_array($user_query);
?>
<DIV class=center>
<table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td height="32" class="STYLE2"><div align="center">�û���Ϣ</div></td>
      </tr>
      <tr>
        <td height="190" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
      
                <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                  
                  <tr>
                    <td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">�û�ID</span></div></td>
                    <td><div align="center" class="style21"><?php echo $UserId; ?></div></td>
                    <td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">����</span></div></td>
                    <td><div align="left" class="style21"><?php echo $row["name"]; ?></span></div></td>
					<td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">�ԡ�����</span></div></td>
                    <td><div align="left" class="style21"><?php if($row["sex"]) echo "Ů";else echo "��";?></div></td>
                  </tr>
                  <tr>
                    <td height="25" bgcolor="#DDDDDD"><div align="center" class="style21"><strong>��ַ</strong></div></td>
                    <td><div align="left" class="style21"><?php echo $row['address'];?></div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#DDDDDD"><div align="center"><span class="style1">E-mail</span></div></td>
                    <td><div align="left" class="style21"><?php echo $row['Email'];?></div></td>
                  </tr>
               
         
                </table>