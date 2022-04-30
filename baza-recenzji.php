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
  echo "Proszę wpisać tytuł wyszukiwanej recenzji gry: ";
?>

 <form method="GET">
   <input type="text" name="search-phrase" value="<?php echo $search_phrase ?>" />
   <button type="submit">Szukaj</button>
 </form>

<?php
  if($search_phrase) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
//TO DO 1111111111111111111111111111111111111111111
    $sql = "SELECT * FROM mojarecenzja WHERE nazwaGra='$search_phrase';";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    $array = array();
    echo "<h2> RECENZJE GRY $search_phrase: </h2>";
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
