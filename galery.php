<?php
    require "header.php";
?>

	<main class="flex">

		<article id="galery1" class="article-full-width flex container-fluid" style="background: transparent;">
			<section class="article-section-item">
			    <h1>Galeria zdjęć najsilniejszego człowieka na świecie</h1>

    			<p>
    				Na zdjęciach poniżej można zaobserwować potęznego polaka Mariusza Pudzianowskiego, znanego też jako Pudzilla, w rożnych sytuacjach.
    			</p>
			</section>
			<section class="article-section-item">
			    <h1>Polska górą. Lecimy tutaj!</h1>

    			<p>
    				Na zdjęciach poniżej można zaobserwować potęznego polaka Mariusza Pudzianowskiego, znanego też jako Pudzilla, w rożnych sytuacjach.
    			</p>
			</section>
		</article>

		<article class="article-full-width">
			<section class="galery flex">

				<?php
					$files = array_values(array_diff(scandir('img/pudzian'), array('..', '.')));

					foreach ($files as $file)
					{
						echo('<figure class="photo flex">');
						echo('<img src="img/pudzian/' . $file . '">');
						echo('<figcaption>' . substr($file, 0 , (strrpos($file, "."))) . '</figcaption>');
						echo('</figure>');
							
					}
				?>
			</section>
		</article>
		
		<article id="galery2" class="article-full-width flex container-fluid" style="background: transparent;">
		    <section class="article-section-item">
    			<h1>Galeria zdjęć uczestników Worlds Strongest Man</h1>
    
    			<p>
    				Zdjęcia ukazują uczestników Worlds Strongest Man podczas różnych konkurencji.
    			</p>
			</section>
			<section class="article-section-item">
			    <h1>Galeria zdjęć najsilniejszego człowieka na świecie</h1>

    			<p>
    				Na zdjęciach poniżej można zaobserwować strongmanów w rożnych sytuacjach.
    			</p>
			</section>
		</article>

		<article class="article-full-width">
			<section class="galery flex">

				<?php
					$files = array_values(array_diff(scandir('img/wsm'), array('..', '.')));

					foreach ($files as $file)
					{
						echo('<figure class="photo flex">');
						echo('<img src="img/wsm/' . $file . '">');
						echo('<figcaption>' . substr($file, 0 , (strrpos($file, "."))) . '</figcaption>');
						echo('</figure>');
							
					}
				?>

			</section>
		</article>

	</main>

<?php
    require "footer.php";
?>
                                                                                                                                                                                                                                                                                                                                          