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
   echo "Proszę wpisać tytuł gry, którą chcesz usunąć: ";
 ?>

  <form method="GET">
    <input type="text" name="search-phrase" value="<?php echo $search_phrase ?>" />
    <button type="submit">Usuń</button>
  </form>

 <?php
   if($search_phrase) {
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "projekt";

     $conn = mysqli_connect($servername, $username, $password, $dbname);
     //Problem nr 1 - usuwa mi to idPodgatunek :I
     //Rozwiązanie problemu 1, zmieniłem FK_Gra_ma_podgatunek z ON DELETE CASCADE na ON DELETE NO ACTION
     $sql = "DELETE FROM Gra WHERE idGra = (SELECT idGra FROM Gra WHERE nazwaGra='$search_phrase');";

     if (mysqli_query($conn, $sql)) {
       echo "Pomyślnie usunięto grę z bazy danych";
     } else {
       echo "Błąd podczas usuwania gry z bazy danych " . mysqli_error($conn);
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
   $sql = "SELECT * FROM bazagier;";
   $result = mysqli_query($conn, $sql);
   $resultcheck = mysqli_num_rows($result);
   $array = array();
   echo "<table>";
   echo "<h2> WSZYSTKIE GRY: </h2>";
   echo "<tr><td>" . 'Nazwa Gry' . "</td><td>" . 'Opis Gry' . "</td><td>" . 'Producent' . "</td><td>" . 'Wydawca' . "</td><td>" . 'Platforma' . "</td><td>" . 'Gatunek' . "</td><td>" . 'Podgatunek' . "</td></tr>";
   if ($resultcheck > 0)
   {
    while ($row = mysqli_fetch_assoc($result)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $sql
    {
      echo "<tr><td>" . $row['nazwaGra'] . "</td><td>" . $row['opisGra'] . "</td><td>" . $row['nazwaProducent'] . "</td><td>" . $row['nazwaWydawca'] . "</td><td>" . $row['nazwaPlatforma'] . "</td><td>" . $row['nazwaGatunek'] .
      "</td><td>" . $row['nazwaPodgatunek'] . "</td></tr>";
      $array[] = $row['opisGra'];
   //tu logika:
   // - request do bazy wyciagajacy wszystko co pasuje do LIKE 'seach_phrase%'
   // - wydrukowanie wynikow pod spodem
 }
 }
 echo "</table>";
 }
 ?>

  <?php
    require "footer.php";
 ?>
