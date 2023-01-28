<?php
   require "header.php";
?>

<main class="flex">
    <section class="article-full-width flex container-fluid" style="background: transparent;">
        <section class="article-section-item">
            <h1>Chcesz zadać nam jakieś pytanie?</h1>
            <p>
                Wypełnij formularz poniżej i wyślij nam wiadomość e - mail!
            </p>
        </section>
        
        <section class="article-section-item">
            <h1>Chcesz dostawać najnowsze informacje?</h1>
            <p>
                Zapisz się na newsletter i otrzymuj informacje o najnowszych zmianach na jak i na temat Mariusza Pudzianowskiego!
            </p>
        </section>
    </section>
   <section class="article-rotated container-fluid">
      <section class="flex contact-container" style="margin: 30vh 0 10vh 0;">
         <section class="flex article-section-item">
            <form action="include/#.inc.php" method="post">
               <input type="text" name="email" placeholder="E - mail">
               <input type="text" placeholder="textarea">
               <button type="submit" name="newsletter-submit">Wyślij!</button>
            </form>
         </section>
         <section class="flex article-section-item">
            <h1>Skontaktuj się z nami!</h1>
            <p>
                Wyślij nam wiadomość e - mail i powiedz co sądzisz o naszym portalu. Możesz też zadać pytanie lub zaproponować zmianę na stronie. 
         </section>
      </section>
      <section class="flex newsletter-container" style="margin: 10vh 0 30vh 0;">
         <section class="flex article-section-item">
            <h1>Zapisz się na newsletter!</h1>
            <p>
                Nie przegap najnowszych informacji. Zapisz się już dziś!
            </p>
         </section>
         <section class="flex article-section-item">
            <form action="include/#.inc.php" method="post">
                <input type="text" name="name" placeholder="Imię">
                <input type="text" name="lastname" placeholder="Nazwisko">
                <input type="text" name="email" placeholder="E - mail">
               <button type="submit" name="newsletter-submit">Zapisz się!</button>
            </form>
         </section>
      </section>
   </section>
   <section class="article-full-width flex container-fluid" style="background: transparent;">
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
   </section>
</main>

<?php
   require "footer.php";
?>
                                                                                                                                                                                                                                                                                                                                                                                                      