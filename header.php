<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Witaj.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>

      <header>
        <nav>
          <div class="header">
          <div class="logo">

          <!--a><img src="logo.jpg"></a-->
        </div>
          <ul class="menu">
            <li><a href="site.php">Powrót</a></li>
            <li><a href="konto.php">Moje Recenzje</a></li>
            <li><a href="baza-gier.php">Baza Gier</a></li>
            <li><a href="baza-recenzji.php">Baza Recenzji</a></li>
          </ul>
          <div class="login">

            <?php
            if (isset($_SESSION['KontoUid'])) {
              echo  '            <form action="includes/logout.inc.php" method="post">
                            <button type="submit" class="button-log" name="logout-submit">Wyloguj</button>
                          </form>';
            }
            else {
              echo '            <form action="includes/login.inc.php" method="post">
                            <input type="text" name="mailuid" placeholder="Login lub Email">
                            <input type="password" name="pwd" placeholder="Haslo">
                            <button type="submit" class="button-log" name="login-submit">Zaloguj</button>
                          </form>
                          <div class="header"> <ul class="menus"> <li> <a href="signup.php">Zarejestruj sie</a> </li> </ul> </div>';
            }

            if (isset($_SESSION['KontoUid'])) {
              echo  '            <form action="dodaj-recenzje.php" method="post">
                            <button type="submit" class="button-gra" name="dodaj-recenzje">Dodaj Recenzję</button>
                          </form>';

            }
            else {

              

            }


             ?>

          </div>

        </nav>
      </header>
