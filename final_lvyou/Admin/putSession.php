<?PHP
  session_start();
  // ȡ������û����������Լ��û����
  $UID=$_POST["loginname"];
  $PSWD=$_POST["password"];
  include('../Class/Users.php');
  $objUser = new Users();
  $objUser->UserId=$UID;
  $objUser->UserPwd=$PSWD;
  // �ж��û��������Ƿ���ȷ
  if($objUser->CheckUser())
  {
    // ���û������������Session
    $objUser->GetUsersInfo($UID);
    $_SESSION["UserName"]=$UID;
    $_SESSION["UserPwd"]=$PSWD;
    $_SESSION["UserType"]=$objUser->UserType;
    header("Location: "."index.php");
  }
  else
  {
    header("Location: "."login.php");
  } 
?>
