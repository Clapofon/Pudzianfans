<?php
  session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PudzianFans - Strona Główna</title>
	<link href="css/main.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>
<body>
	<nav class="flex container-fluid main-nav">
        <button class="hamburger nav-hamburger-button" style="margin: 0 0 0 20px"></button>
        <button class="nav-close-button close-button" style="position: absolute; top: 0; left: 0; display: none;"></button>
		<ul class="flex nav">
			<li>
				<a href="index.php">Strona Główna</a>
			</li>
			<li>
				<a href="news.php">Aktualności</a>
			</li>
			<li>
				<a href="contact.php">Kontakt</a>
			</li>
			<li>
				<a href="galery.php">Galeria</a>
			</li>
            <li>
				<a href="videos.php">Videos</a>
			</li>
			<?php
			    if (isset($_SESSION['userId']))
                {
                    ?>
                        <li>
            				<a href="add_post.php">Dodaj post</a>
            			</li>
                    <?php
                }
			?>
		</ul>

        <form class="searchbar-form" action="videos.php" method="post">
            <input class="searchbar" type="text" name="searchbar" list="suggestions" placeholder="Search...">
            <datalist id="suggestions">
                <option>sugestion 1</option>
                <option>sugestion 3</option>
                <option>sugestion 3</option>
            </datalist>
            <input type="hidden" name="search-submit">
        </form>

        <?php
            if (isset($_SESSION['userId']))
            {
                ?>
                    <div class="logged-in">true</div>
                    <ul class="dropdown-list">
                        <li class="dropdown">
                            <?php
                                echo("<p>".$_SESSION['username']."</p>");
                            ?>
                            <ul class="inside">
                                <li>
                                    <a href="settings.php"> Ustawienia </a>
                                </li>
                                <li>
                                    <form action="include/logout.inc.php" method="post">
                                        <button name="logout-submit" type="submit">Wyloguj</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
            }
            else
            {
                ?>
                    <div class="logged-in">false</div>
                    <form action="include/login.inc.php" method="post" class="flex nav-form-container">
                        <input type="text" name="username" placeholder="E - mail lub login">
                        <input type="password" name="password" placeholder="Hasło">
                        <button type="submit" name="login-submit">Zaloguj</button>
                    </form>
                    <button class="hamburger login-hamburger-button" style="margin: 0 20px 0 0"></button>
                <?php
            }
        ?>
	</nav>
	
	<section class="weather-widget flex">
        <a class="weatherwidget-io" href="https://forecast7.com/pl/50d1018d55/rybnik/" data-label_1="RYBNIK" data-label_2="WEATHER" data-theme="original" >RYBNIK WEATHER</a>
        <section class="weather-widget-button-container flex">
            <button class="weather-widget-button-open">❯❯</button>
            <button class="weather-widget-button-close">❮❮</button>
        </section>
    </section>
	
	
                                                                                                                        