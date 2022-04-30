<?php
  require "header.php";
 ?>

      <main>

        <?php
          if (isset($_SESSION['KontoUid'])) {
            echo 'Jestes Zalogowany!';
            header("Location: konto.php?username={$_SESSION['KontoUid']}");
          }
          else {
            echo '<div class="message-center">Jesteś wylogowany! Zaloguj/Zarejestruj się! </div>';
          }

         ?>
      </main>



 <?php
   require "footer.php";
  ?>
