<?php

    require_once "header.php";

?>


<main class="flex" style="margin: 80px 0 0 0;">

    <article class="article-full-width flex container-fluid" style="background: #303030; margin: 0 0 50px 0;">
        <div class="article-leftside flex">
            <?php
                //get some vids displayed if nothing was searched
                require_once "include/searchMedia.inc.php";

                if (isset($_GET['vid']))
                {
                    increaseViewCount($_GET['id']);
                    ?>
                        <div class="video-container" id="videoplayer">
                            <video controls>
                                <source src="video/<?php echo($_GET['vid']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                    <?php
                        $row = getVideoInfo($_GET['id']);
                        $authorProfilePicture = "img/pudzian1.jpg";
                    ?>
                            <div class="video-description flex">
                                <div class="upper-videoplayer">
                                    <div>
                                        <h2>
                                            <?php echo($row['title']) ?> 
                                        </h2>
                                    </div>
                                    <p><?php echo($row['views']); ?> wyświetleń <?php echo($row['createdAt']); ?></p>
                                </div>
                                <div class="lower-videoplayer flex">
                                    <div class="lower-videoplayer-left" style="padding: 25px;">
                                        <img src="<?php echo($authorProfilePicture); ?>">
                                    </div>
                                    <div class="lower-videoplayer-right flex">
                                        <p><?php echo($row['author']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php

                }
                else
                {
                    if (isset($_POST['searchbar']))
                    {
                        echo('<section class="galery flex">');
                        displayMediaIfSearched($_POST['searchbar']);
                        echo('</section>');
                    }
                    else
                    {
                        displayAll("video");
                    }
                }

            ?>
        </div>
        <?php
            if (isset($_GET['vid']))
            {
        ?>
                <div class="article-rightside flex">
                    
                    <?php
                        $keywords = explode(" ", $row['title']);
                        displayRelated("video", strtolower($keywords[0]), $row['mediaId']);
                    ?>

                </div>

        <?php
            }
        ?>
        

    </article>

</main>


<?php

    require_once "footer.php";

?>