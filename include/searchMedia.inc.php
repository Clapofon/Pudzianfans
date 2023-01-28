<?php
    
    function displayMediaIfSearched($searchPhrase)
    {
        if (!isset($_POST['search-submit']))
        {
            return;
        }

        if (!isset($searchPhrase) || empty($searchPhrase))
        {
            header("Location: videos.php?emptysearch");
            exit();
        }

        require_once "dbh.inc.php";

        $sql = "SELECT * FROM media WHERE keywords LIKE ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: videos.php?sqlerror");
            exit();
        }

        $likeClause = '%'.$searchPhrase.'%';
        mysqli_stmt_bind_param($stmt, "s", $likeClause);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            switch ($row['mediaType'])
            {
                case "video":
                    $path = str_replace("video/", "", $row['mediaPath']);
                    displayVideoThumbnail($row['mediaId'], $row['title'], $row['description'], $row['createdAt'], $row['length'], $row['author'], $row['views'], $row['thumbnail'], $row['mediaPath'], $path);
                    break;
                case "picture":
                    break;
            }
        }
    }

    function displayVideoThumbnail($id, $title, $description, $date, $length, $author, $views, $thumbnail, $source, $path)
    {
        $authorProfilePicture = "img/pudzian1.jpg";
        ?>
            <figure class="video flex">
                <div class="thumb-container">
                    <img class="thumb" src="<?php echo($thumbnail); ?>">
                    <a class="thumb-anchor" href="videos.php?vid=<?php echo($path); ?>&id=<?php echo($id); ?>"></a>
                </div>
                <!--<div class="length"><?php// echo($length); ?></div>-->
                <div class="thumb-left flex">
                    <img src="<?php echo($authorProfilePicture); ?>">
                </div>
                <div class="thumb-right">
                    <figcaption>
                        <a href="videos.php?vid=<?php echo($path); ?>&id=<?php echo($id); ?>">
                            <?php echo($title) ?>
                        </a>
                    </figcaption>
                    <p><?php echo($author); ?></p>
                    <p><?php echo($views); ?> wyświetleń <?php echo($date); ?></p>
                </div>
            </figure>
        <?php
    }

    function getVideoInfo($id)
    {
        require "dbh.inc.php";

        $sql = "SELECT * FROM media WHERE mediaId=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: videos.php?sqlerrortukej");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function increaseViewCount($id)
    {
        require "dbh.inc.php";

        $sql = "UPDATE media SET views=views+1 WHERE mediaId=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../videos.php?sqlerrorviews");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $id);

        mysqli_stmt_execute($stmt);
    }

    function displayAll($type)
    {
        require "dbh.inc.php";

        $sql = "SELECT * FROM media WHERE mediaType=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: videos.php?sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $type);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            switch ($row['mediaType'])
            {
                case "video":
                    $path = str_replace("video/", "", $row['mediaPath']);
                    displayVideoThumbnail($row['mediaId'], $row['title'], $row['description'], $row['createdAt'], $row['length'], $row['author'], $row['views'], $row['thumbnail'], $row['mediaPath'], $path);
                    break;
                case "picture":
                    break;
            }
        }
    }

    function displayRelated($type, $keyword, $id)
    {
        require "dbh.inc.php";

        $sql = "SELECT * FROM media WHERE mediaType=? AND keywords LIKE ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: videos.php?sqlerror");
            exit();
        }

        $likeClause = '%'.$keyword.'%';
        mysqli_stmt_bind_param($stmt, "ss", $type, $likeClause);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {   
            $path = str_replace("video/", "", $row['mediaPath']);
            displayVideoThumbnail($row['mediaId'], $row['title'], $row['description'], $row['createdAt'], $row['length'], 
                                    $row['author'], $row['views'], $row['thumbnail'], $row['mediaPath'], $path);
        }
    }
   
?>