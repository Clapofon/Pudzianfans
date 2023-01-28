<?php
    require "header.php";
    
    if (isset($_SESSION['userId']))
    {
        ?>
            <main class="flex container-fluid">
                <form action="include/add_post.inc.php" method="post" class="add-post-form">
                    <article class="article-normal">
                        <header class="flex container-fluid">
                            <h1 class="container-fluid">
                                <input name="post-header-content" type="text" placeholder="Nagłówek... ">
                            </h1>
                            <p class="container-fluid">
                                <?php 
                                    echo date("Y / m / m   ");
                                    echo date("h:i:s");
                                ?>
                            </p>
                        </header>
                        <main class="flex container-fluid">
                            <p class="container-fluid">
                                <textarea name="post-content" type="text" placeholder="Treść... " class="textarea"></textarea>
                            </p>
                            <textarea name="post-additional-content" type="text" placeholder="Zdjecia, filmy... " class="textarea"></textarea>
                        </main>
			            <input name="post-creator" type="hidden" value="<?php echo($_SESSION['username']); ?>">
                        <button name="post-creation-submit" type="submit">Dodaj post</button>
                    </article>
                </form>
            </main>
        <?php
    }
    
    require "footer.php";
?>                                                                                                                        
