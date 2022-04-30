<?php
  require "header.php";
 ?>

      <main>
        <h1>Zarejestruj sie</h1>
        <form action="includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Login">
          <input type="text" name="mail" placeholder="Email">
          <input type="password" name="pwd" placeholder="Haslo">
          <input type="password" name="pwd-repeat" placeholder="Powtorz Haslo">
          <button type="submit" class="button-out" name="signup-submit">Zarejestruj sie</button>
        </form>
      </main>



 <?php
   require "footer.php";
  ?>
