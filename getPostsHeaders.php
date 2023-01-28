<?php
    require_once "include/dbh.inc.php";
    
    $sql = "SELECT * FROM posts;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../news.php?error=sqlerror");
      exit();
    }
    
    mysqli_stmt_execute($stmt);
    $postsResult = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($postsResult))
    {
        $postId = $row['postId'];
        $sql = "SELECT * FROM comments WHERE postId=$postId;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: news.php?error=sqlerror");
            exit();
        }
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $comments = mysqli_num_rows($result);
        
        ?>
            <article class="article-normal">
                <header>
                    <a href="show_posts.php?id=<?php echo($row['postId']); ?>">
                        <h1 class="container-fluid"><?php echo($row['postHeaderContent']); ?></h1>
                    </a>
                    <p class="container-fluid"><?php echo($row['postDate']); ?></p>    
                </header>
                <p class="container-fluid comm-count">Komentarze: <?php echo($comments); ?></p>
                <p>
                    <?php echo("upvotes: ".$row['postUpvotes']); ?>
                    <?php echo("downvotes: ".$row['postDownvotes']); ?>
                </p>
            </article>
        <?php
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>                                                                                                                                                                                                                                                               