<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION["user_id"])){
	header("Location:index.php");
	exit();
}

//�������ݿ������ļ�
 include('..\Class\Users.php');
  $UserId=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  $objUser=new Users();
$objUser->GetUsersInfo($UserId);
if($UserId!="" && $objUser->UserPwd==$Pwd)
{
?>

<table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td height="32" class="STYLE2"><div align="center">�û���Ϣ</div></td>
		
      
                <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                  
                  <tr>
                    <td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">�û�ID</span></div></td>
                    <td><div align="center" class="style21"><?php echo $UserId; ?></div></td>
                    <td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">����</span></div></td>
                    <td><div align="center" class="style21"><?php echo $objUser->Name; ?></span></div></td>
					<td height="25" bgcolor="#DDDDDD"><div align="center"><span class="style1">�ԡ�����</span></div></td>
                    <td><div align="center" class="style21"><?php if($objUser->Sex) echo "Ů";else echo "��";?></div></td>
                  </tr>
                  <tr>
                    <td height="25" bgcolor="#DDDDDD"><div align="center" class="style21"><strong>��ַ</strong></div></td>
                    <td><div align="center" class="style21"><?php echo $objUser->Address;?></div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#DDDDDD"><div align="center"><span class="style1">E-mail</span></div></td>
                    <td><div align="center" class="style21"><?php echo $objUser->Email;?></div></td>
                  </tr>
               
         
                </table>
				</table>
				<?php
				}
				else echo "no";
				?>