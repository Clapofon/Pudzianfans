<?php
    require "header.php";
?>

<main class="flex container-fluid">

    <?php
        require_once "include/dbh.inc.php";
        
        $sql = "SELECT * FROM posts WHERE postId=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("Location: ../news.php?error=sqlerror");
          exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $postsResult = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($postsResult);

            ?>
                <article class="article-normal">
                    <header>
                        <h1 class="container-fluid"><?php echo($row['postHeaderContent']); ?></h1>
                        <p class="container-fluid"><?php echo($row['postDate']); ?></p>    
                    </header>
                    <main class="flex">
                        <p class="container-fluid">
                            <?php echo($row['postContent']); ?>
                        </p>
                        <?php echo($row['postAdditionalContent']); ?>
                    </main>
                    <footer>
                        <p>
                            <?php echo("upvotes: ".$row['postUpvotes']); ?>
                            <?php echo("downvotes: ".$row['postDownvotes']); ?>
                        </p>
                        <article class="flex container-fluid">
                            <!--<input type="text" class="comment" value="jddddddddddddddddddddd">-->
                            <?php
                                require_once "include/dbh.inc.php";
                            
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
                            
                            <p class="container-fluid comm-count">Komentarze (<?php echo($comments); ?>): </p>
                            
                            <?php
                                if ($comments > 0) 
                                {
                                    ?>
                                        <form action="comment.php" method="post" id="show-comments-form">
                                            <input name="num-comments" type="hidden" value="10">
                                            <input name="postId" value="<?php echo($postId); ?>" type="hidden">
                                            <button name="show-comments-submit" type="submit" class="show-comments-button">pokaz komentarze</button>
                                        </form>
                                    <?php
                                }
                            ?>
                            
                            <?php
                                //require_once "comment.php";
                            
                                if (isset($_SESSION['userId']))
                                {
                                    ?>
                                        <form class="add-comment container-fluid" action="include/comment.inc.php" method="post" id="add-comments-form">
                                            <input name="comment-content" type="text" placeholder="Twoj komentarz..." class="container-fluid">
                                            <input name="comment-creator" value="<?php echo($_SESSION['username']); ?>" type="hidden">
                                            <input name="post-id" value="<?php echo($postId); ?>" type="hidden">
                                            <button name="comment-submit" type="submit">Dodaj komentarz</button>
                                        </form>
                                    <?php
                                }
                            ?>
                            
                            <article class="comments-container flex container-fluid">
                                
                            </article>
                            
                        </article>
                    </footer>
                </article>
            <?php
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    ?>   

</main>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/displayComments.js" type="text/javascript"></script>
<script src="js/addComment.js" type="text/javascript"></script>

<?php
    require "footer.php";
?>


                                                                                                                        