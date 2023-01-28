<?php
    if(!isset($_POST['signup-submit']))
    {
        header("Location: ../index.php");
        exit();
    }
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $passrepeat = $_POST['passrepeat'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];

    if(empty($username) || empty($pass) || empty($passrepeat) || empty($email))
    {
        header("Location: ../index.php?s=frf");
        exit();
    }
    
    if($pass !== $passrepeat)
    {
        header("Location: ../index.php?s=prmm");
        exit();
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../index.php?s=ie");
        exit();
    }
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("Location: ../index.php?s=pme");
        exit();
    }
    require_once "dbh.inc.php";

    $sql = "SELECT username FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../index.php?s=mysqle");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);

    $usernameToLower = strtolower($username);
    $notAllowed = array("admin", "administrator", "root");

    if($resultCheck > 0)
    {
        header("Location: ../index.php?s=unt");
        exit();
    }
    
    if(in_array($usernameToLower, $notAllowed))
    {
        header("Location: ../index.php?s=unf");
        exit();
    }
    
    $sql = "INSERT INTO users (username, userEmail, userPassword, userPhoneNum) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../index.php?s=mysqle");
        exit();
    }

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    
    if (empty($phoneNum))
    {
        $phoneNum = "0";
    }

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPass, $phoneNum);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: ../index.php?s=success");
    exit();
?>
                              