<?php
        require "dbh.inc.php";

        $content = $_POST['comment-content'];
        $commentCreator = $_POST['comment-creator'];
        $postId = $_POST['post-id'];
        
        if (empty($content))
        {
            $result = array("status" => "empty-comment");
    
            echo json_encode($result);
            exit();
        }

        $sql = "INSERT INTO comments (commentContent, commentCreator, postId) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../news.php?error=sqlerror");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ssi", $content, $commentCreator, $postId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $result = array("status" => "ok");
        echo json_encode($result);
?>
                                                                                                                                                                                                                                                                                                                           