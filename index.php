<?php
    require "header.php";
?>
    
    <div class="login-form-modal flex">
        <button class="login-close-button close-button" style="position: absolute; top: 0; left: 0;"></button>

        <form action="include/login.inc.php" method="post" class="form-container" style="transform: translateY(200px);">
			<input type="text" name="username" placeholder="E - mail lub login">
			<input type="password" name="password" placeholder="Hasło">
			<button type="submit" name="login-submit">Zaloguj</button>
		</form>
    </div>
	<div class="landing-page flex container-fluid">
	    <div class="slideshow-container container-fluid">

            <div class="slide fade container-fluid">
                <img src="img/lpSlideshowImage1.jpg">
                <!--<div class="text">Caption Text</div>-->
            </div>
            
            <div class="slide fade container-fluid">
                <img src="img/hafthor2.jpg">
                <!--<div class="text">Caption Two</div>-->
            </div>
            
            <div class="slide fade container-fluid">
                <img src="img/hafthor1.jpg">
                <!--<div class="text">Caption Three</div>-->
            </div>
            
            <div class="slide fade container-fluid">
                <img src="img/martins2.jpg">
                <!--<div class="text">Caption Three</div>-->
            </div>
            
            <div class="slide fade container-fluid">
                <img src="img/martins3.jpg">
                <!--<div class="text">Caption Three</div>-->
            </div>
            
            <!-- Next and previous buttons -->
            <a class="prev flex">❮</a>
            <a class="next flex">❯</a>
        </div>
        
		<section class="lpSection">
			<?php
                if (isset($_GET['sfm']))
                {
                    if ($_GET['sfm'] == "true")
                    {
                        require_once "signup.php";
                    }
                }

				if (isset($_GET['login']))
				{
					if ($_GET['login'] == "success")
					{
						echo("zalogowano");
					}
				}

				if (isset($_GET['error']))
				{
					if ($_GET['error'] == "wrongcredencials")
					{
						echo("niezalogowano");
					}
				}
                else
                {
                    ?>
                        <h3>PudzianFans - portal dla Ciebie!</h3>

                        <p>
                            Znajdziesz tu wszystko o sporcie, wydarzeniach w mistrzostwach świata strongmanów jak i na świecie, odryjesz nieznane pasje i zainteresowania jak i pogłębisz wiedze w już odrytych prze Ciebie 
                            mocnych stronach! Sprawdzaj pogode w czasie rzeczywistym dzieki naszym nowoczesnym systemom i ciesz się z niezawodności naszej witryny.
                            <span class="link"><a href="index.php?sfm=true">Stwórz swoje własne konto</a></span>
                            już teraz i ciesz się wygodą użytkowania.
                        </p>
                    <?php
                }
            ?>
		</section>
	</div>
	<main class="flex">
        
        <article class="article-full-width flex container-fluid" style="background: transparent;">
            <section class="article-section-item">
                <h1>Zdjęcia z wydarzenia Worlds Strongest Man 2019</h1>
            </section>
			
			<!--<audio src="polska_gorom.mp4" controls>
                
            </audio>-->

			<section class="article-section-item">
			    <p>
    				Prezentujemy państwu zdjęcia zrobiene podczas zawodów Worlds Strongest Man w roku 2019. Znajdują się na nich między innymi:
    			</p>
    			
    			<ul>
    			    <li>
    			        <a href="#">Martins Licins</a> <span class="list-more">- zwycięzca zawodów</span>
    			    </li>
    			    <li>
    			        <a href="#">Mateusz Kieliszkowski</a><span class="list-more"> - drugie miejsce</span>
    			    </li>
    			    <li>
    			        <a href="#">Hafþór Júlíus Björnsson</a><span class="list-more"> - trzecie miejsce, posiadacz rekordu świata w martwym ciągu. Hafþór podniósł aż 501kg</span>
    			    </li>
    			</ul>
			</section>
		</article>

		<article class="article-rotated container-fluid flex">
		    
		    <h1>Worlds Strongest Man 2019</h1>
		    
			<section class="galery flex">

				<?php
					$files = array_values(array_diff(scandir('img/wsm'), array('..', '.')));

					for ($i = 0; $i < 8; $i++)
					{
						echo('<figure class="photo flex">');
						echo('<img src="img/wsm/' . $files[$i] . '">');
						echo('<figcaption>' . substr($files[$i], 0 , (strrpos($files[$i], "."))) . '</figcaption>');
						echo('</figure>');
							
					}
				?>

			</section>
			
			<p>
			    <a href="galery.php#galery2">Zobacz więcej zdjęć potężnych strongmanów.</a>
			</p>
		</article>
		
		<article class="article-full-width flex container-fluid" style="background: transparent;">
	        <section class="article-section-item">
	            <h1>Mariusz Pudzianowski jak zwykle w potężnej formie</h1>
    		    <p>
    		        Mariusz Pudzianowki jak zwykle nie zawodzi swoich fanów. Zobacz jego ostatnią walke na gali KSW <a href="news.php">tutaj.</a> 
    		    </p>
	        </section>
	        
	        <section class="article-section-item">
	            <h1>Wielki polak, Polska Górą!</h1>
    		    <p>
    		        lorem ipsum dolor sit amet lorem ipsum dolor sit ametlorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
    		    </p>
	        </section>
		</article>
		
		<article class="flex container-fluid article-full-width">
		    
		    <section class="galery flex">
				<?php
					$files = array_values(array_diff(scandir('img/pudzian'), array('..', '.')));

					for ($i = 0; $i < 8; $i++)
					{
						echo('<figure class="photo flex">');
						echo('<img src="img/pudzian/' . $files[$i] . '">');
						echo('<figcaption>' . substr($files[$i], 0 , (strrpos($files[$i], "."))) . '</figcaption>');
						echo('</figure>');
							
					}
				?>

			</section>
			
			<p>
			    <a href="galery.php#galery1">Zobacz więcej zdjęć potężnego polaka.</a>
			</p>
		</article>
		
		<article class="flex container-fluid article-full-width" style="background: transparent;">
		    <section class="article-section-item">
		        <h1>Nie stworzyłeś jeszcze konta?</h1>
    		    <p>
    		        Możesz stworzyć go tutaj i dodawać własne posty, komentarze. Stworzenie konta to pierwszy krok aby twój post znalazł się na głównej stronie z aktualnościami. 
    		        Nie zwlekaj i dołącz do potężnej społeczności już teraz!
    		    </p>
		    </section>
		    <section class="article-section-item">
		        <?php
		            require "signup.php";
		        ?>
		    </section>
		</article>
        
	</main>
	
	<script src="js/slideshow.js"></script>

<?php
    require "footer.php";
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
