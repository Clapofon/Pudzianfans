<?php
  if(!isset($_POST['login-submit']))
  {
    header("Location: ../index.php");
    exit();
  }
    
  require_once "dbh.inc.php";

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password))
  {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }

  $sql = "SELECT * FROM users WHERE username=? OR userEmail=?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../index.php?error=sqlerror");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, "ss", $username, $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($result))
  {
    $pwdCheck = password_verify($password, $row['userPassword']);
    if(!$pwdCheck)
    {
      header("Location: ../index.php?error=wrongcredencials");
      exit();
    }

    session_start();
    $_SESSION['userId'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['userEmail'] = $row['userEmail'];

    header("Location: ../index.php?login=success");
    exit();
  }
  else
  {
    header("Location: ../index.php?error=wrongcredencials");
    exit();
  }


?>
               