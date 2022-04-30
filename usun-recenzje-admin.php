<?php
  require "header.php";
 ?>
 <style>

 .lista tr, td
 {
   text-align:center;
   list-style-type: none;
   margin: 5px;
   padding: 2px;
   outline: 1px solid #000;
 }

 </style>

 <?php
   $search_phrase = isset($_GET['search-phrase']) ? $_GET['search-phrase'] : '';
   $search_phrase1 = isset($_GET['search-phrase1']) ? $_GET['search-phrase1'] : '';
   echo "Proszę wpisz nazwę Gry: Nazwę Użytkownika: ...Którego recenzje chcesz usunąć: ";
 ?>

  <form method="GET">
    <input type="text" name="search-phrase" value="<?php echo $search_phrase ?>" />
    <input type="text" name="search-phrase1" value="<?php echo $search_phrase1 ?>" />
    <button type="submit">Usuń</button>
  </form>

 <?php
   if($search_phrase) {
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "projekt";

     $conn = mysqli_connect($servername, $username, $password, $dbname);

     if (isset($_SESSION['KontoUid'])){
       $nazwagracza = $_SESSION['KontoUid'];
     }
     else {
       echo "NIC TU NIE MA";
     }

     //Problem nr 1 - usuwa mi to idPodgatunek :I
     //Rozwiązanie problemu 1, zmieniłem FK_Gra_ma_podgatunek z ON DELETE CASCADE na ON DELETE NO ACTION
     $sql = "DELETE FROM recenzja WHERE idKonto = (SELECT idKonto FROM Konto WHERE nazwaKonto='$search_phrase1') AND idGra = (SELECT idGra FROM Gra WHERE nazwaGra='$search_phrase');";

     if (mysqli_query($conn, $sql)) {
       echo "Pomyślnie usunięto recenzje z bazy danych";
     } else {
       echo "Błąd podczas usuwania recenzji z bazy danych " . mysqli_error($conn);
     }

     mysqli_close($conn);
 }
 else {
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "projekt";

   $conn = mysqli_connect($servername, $username, $password, $dbname);
 //TO DO 1111111111111111111111111111111111111111111
   $sql = "SELECT * FROM mojarecenzja;";
   $result = mysqli_query($conn, $sql);
   $resultcheck = mysqli_num_rows($result);
   $array = array();
   echo "<h2> WSZYSTKIE RECENZJE: </h2>";
   echo "<table>";
 echo "<tr><td>" . 'Recenzent' . "</td><td>" . 'Nazwa Gry' . "</td><td>" . 'Ocena' . "</td><td>" . 'Ocena Grafiki' . "</td><td>" . 'Ocena Muzyki' . "</td><td>" . 'Ocena Rozgrywki' . "</td><td>" . 'Ocena Fabuły' . "</td><td>" . 'Czas Gry' . "</td><td>" . 'Stopień Ukończenia Gry' . "</td><td>" . 'Tekst Recenzji' . "</td></tr>";
   if ($resultcheck > 0)
   {
    while ($row = mysqli_fetch_assoc($result)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $sql
    {
      echo "<tr><td>" . $row['nazwaKonto'] . "</td><td>" . $row['nazwaGra'] . "</td><td>" . $row['ocena'] . "</td><td>" . $row['OcenaGrafiki'] . "</td><td>" .
      $row['OcenaMuzyki'] . "</td><td>" . $row['OcenaRozgrywki'] . "</td><td>" . $row['OcenaFabuly'] . "</td><td>" . $row['czasGry'] .
      "</td><td>" . $row['ukonczenie'] . "</td><td>" . $row['tekstRecenzji'] . "</td></tr>";
      $array[] = $row['ocena'];
   //tu logika:
   // - request do bazy wyciagajacy wszystko co pasuje do LIKE 'seach_phrase%'
   // - wydrukowanie wynikow pod spodem
 }
 }
 echo "<tr><td>" . '' . "</td><td>" . 'Suma ocen: ' . "</td><td>" . round((array_sum($array) / mysqli_num_rows($result)), 2) . "</td><td>" . '' . "</td><td>" . '' .
 "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td></tr>";
 echo "</table>";


 }
 ?>

  <?php
    require "footer.php";
 ?>
