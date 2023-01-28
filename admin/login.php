<?php
  session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link href="../css/main.css" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
	<main>
    <div class="form-container">
      <?php
        if(isset($_SESSION['adminId']))
        {
          header("Location: dashboard/dashboard.php");
          exit();
        }
      ?>
        <form action="include/login.inc.php" method="post">
          <h2>Log in</h2>
          <?php
            if($_GET['error'] == "emptyfields")
            {
              ?>
                <span class="red-color" style="margin: 0 0 20px 0;"> Fill in empty fields! </span>
              <?php
            }
            if($_GET['error'] == "wrongcredencials")
            {
              ?>
                <span class="red-color" style="margin: 0 0 20px 0;"> Wrong credencials! </span>
              <?php
            }
          ?>
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="login-submit"> Log in </button>
        </form>
    </div>
	</main>
