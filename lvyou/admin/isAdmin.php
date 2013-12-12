<?PHP
ob_start();
?>
<?PHP
  session_start();
  if ($_SESSION["UserType"]!=1)
  {
    header("Location: "."login.php");
  } 
?>