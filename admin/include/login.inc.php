<?php
  if(!isset($_POST['login-submit']))
  {
    header("Location: ../../index.php");
    exit();
  }
   
  require "../../include/dbh.inc.php";

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if(empty($username) || empty($password))
  {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }

  $sql = "SELECT * FROM admins WHERE adminUsername=?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../login.php?error=sqlerror");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($result))
  {
    $pwdCheck = password_verify($password, $row['adminPwd']);
    if(!$pwdCheck)
    {
      header("Location: ../login.php?error=wrongcredencials");
      exit();
    }

    session_start();
    $_SESSION['adminId'] = $row['idAdmin'];
    $_SESSION['adminUsername'] = $row['adminUsername'];
    $_SESSION['adminEmail'] = $row['adminEmail'];

    header("Location: ../login.php?login=success");
    exit();
  }
  else
  {
    header("Location: ../login.php?error=wrongcredencials");
    exit();
  }
?>
