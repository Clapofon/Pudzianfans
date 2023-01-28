<?php
    require_once "include/dbh.inc.php";

    $sql = "SELECT * FROM comments WHERE postId=? ORDER BY commentId DESC;";
    $stmt = mysqli_stmt_init($conn);
    
    $commentNum = $_POST['num-comments'];
    $postId = $_POST['postId'];
    
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: news.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $postId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
            <article class="flex container-fluid comment">
                <header class="flex container-fluid">
                    <p class="container-fluid"><?php echo($row['commentCreator']); ?></p>
                    <p class="container-fluid"><?php echo($row['commentDate']); ?></p>
                </header>
                <main class="flex container-fluid">
                    <p class="container-fluid"><?php echo($row['commentContent']); ?></p>
                </main>
            </article>
        <?php
    }
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             