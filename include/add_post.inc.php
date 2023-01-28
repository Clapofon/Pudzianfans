<?php
    if (!isset($_POST['post-creation-submit']))
    {

        header("Location: ../news.php");
        exit();
    }
    
    require_once "dbh.inc.php";

    $header = $_POST['post-header-content'];
    $content = $_POST['post-content'];
    $additionalContent = $_POST['post-additional-content'];
    $creator = $_POST['post-creator'];
    
    if(empty($header) || empty($content) || empty($creator))
    {
        header("Location: ../add_post.php?error=fillallfields");
        exit();
    }
    
    $sql = "INSERT INTO posts (postHeaderContent, postContent, postAdditionalContent, postCreator) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../add_post.php?error=mysqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $header, $content, $additionalContent, $creator);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("location: ../news.php");
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    exit();
?>                              