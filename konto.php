<?php
  require "header.php";
 ?>
<!--a><img src="tenor.gif"></a-->
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
   if($username = $_GET['username']) {
     if (isset($_SESSION['KontoUid'])) {
      /* echo 'Jesteś zalogowany jako: ';
       echo $_SESSION['KontoUid'];*/
       if ($_SESSION['KontoUid'] == 'admin') {
         //dodaj grę do biblioteki bazy danych
      //   if (isset($_SESSION['KontoUid'])) {
           echo  '            <form action="dodaj-gre.php" method="post">
                         <button type="submit" class="button-gra1" name="dodaj-gre">Dodaj Grę</button>
                       </form>';
          echo             '<form action="usun-konto.php" method="post">
                            <button type="submit" class="button-usun" name="usun-konto">Usuń Użytkownika</button>
                            </form>';
                            echo             '<form action="usun-gre.php" method="post">
                                              <button type="submit" class="button-usungre" name="usun-gre">Usuń Grę</button>
                                              </form>';
       }
       else {
         echo  '            <form action="zmien-recenzje.php" method="post">
                       <button type="submit" class="button-usun" name="zmien-recenzje">Zmień Recenzje</button>
                     </form>';
        echo            '<form action="usun-recenzje.php" method="post">
                          <button type="submit" class="button-usungre" name="usun-recenzje">Usuń Recenzje</button>
                          </form>';
         //pokaż moje recenzje
         //dodaj recenzje? (albo w baza gier)
         //tutaj można przekopiować kod gdy nie chcemy żeby admin mógł dodawać recenzje
         //wolny obserwator, będzie tutaj mógł obejrzeć swoje recenzje
       }
     //TUTAJ SELECT MOICH RECENZJI
       //tu piszemy logikę szczególną, na przypadek gdy patrzysz na własne konto
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "projekt";

       $conn = mysqli_connect($servername, $username, $password, $dbname);

    /*   $recenzent = $_SESSION['KontoUid'];
       $recenzentid = "SELECT idKonto FROM Konto WHERE nazwaKonto = '$recenzent';"
      /* $result3 = mysqli_query($conn, $recenzentid);*/
       $ja = $_SESSION['KontoUid'];
       echo "<h2>" . "Jesteś zalogowany jako: $ja <br> Moje recenzje: " . "</h2>";
       $kajty = $ja;
       $sql = "SELECT * FROM mojarecenzja WHERE nazwaKonto = '$kajty'";
       $result = mysqli_query($conn, $sql);

    /*   $sql1 = "SELECT * FROM Gra;";*/
    /*   $result1 = mysqli_query($conn, $sql1);*/
      /* $resultcheck1 = mysqli_num_rows($result1);*/
       $resultcheck = mysqli_num_rows($result);
      /* $row1 = mysqli_fetch_assoc($result1);*/
       $array = array();
       echo "<table>";
       echo "<tr><td>" . 'Recenzent' . "</td><td>" . 'Nazwa Gry' . "</td><td>" . 'Ocena' . "</td><td>" . 'Ocena Grafiki' . "</td><td>" . 'Ocena Muzyki' . "</td><td>" . 'Ocena Rozgrywki' . "</td><td>" . 'Ocena Fabuły' . "</td><td>" . 'Czas Gry' . "</td><td>" . 'Stopień Ukończenia Gry' . "</td><td>" . 'Tekst Recenzji' . "</td></tr>";
       if ($resultcheck > 0)
       {
        while ($row = mysqli_fetch_assoc($result))
        {
          //echo $row['nazwagry'] . ': ';
          //echo $row['ocena1'] . '<br>';
          echo "<tr><td>" . $row['nazwaKonto'] . "</td><td>" . $row['nazwaGra'] . "</td><td>" . $row['ocena'] . "</td><td>" . $row['OcenaGrafiki'] . "</td><td>" .
          $row['OcenaMuzyki'] . "</td><td>" . $row['OcenaRozgrywki'] . "</td><td>" . $row['OcenaFabuly'] . "</td><td>" . $row['czasGry'] .
          "</td><td>" . $row['ukonczenie'] . "</td><td>" . $row['tekstRecenzji'] . "</td></tr>";
          $array[] = $row['ocena'];
        }
       }
      /* for ($i = 0; $i = $resultcheck; $i++) For each int in k++ we need action in program for each end into p
      oahshag=jaoiahgh.
       {
         $items[i] = $row['ocena1'];

       }
       */
      // $items[] = $row['ocena1'];
       echo "<tr><td>" . '' . "</td><td>" . 'Suma ocen: ' . "</td><td>" . round((array_sum($array) / mysqli_num_rows($result)), 2) . "</td><td>" . '' . "</td><td>" . '' .
        "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td><td>" . '' . "</td></tr>";
       echo "</table>";
     }
     //TUTAJ SELECT OGOLNYCH RECENZJI (?)
     //tu wyciagamy ziomeczka i piszemy ogólną logikę, i bierzemy dużo danych z recenzji, które przetwarzamy w ciągłym algorytmie iteracyjnym, która dzieje się
     // zarówno jak to ty jesteś tym ziomeczkiem, jak i gdy ktoś inny patrzy na niego
     if ($_SESSION['KontoUid'] == 'admin') {
       echo
       '<form action="usun-recenzje-admin.php" method="post">
        <button type="submit" class="button-usunrecenzje" name="usun-recenzjeadmin">Usuń Recenzje</button>
        </form>';
      }
      else {


      }
   }

   else {
     //die('tu jakas ogolna tresc na wypadek braku username w url-u czyli np wyszukiwarke userow albo redirect do str glownej');
     header("Location: site.php?error_please_login");
   }

  ?>



<?php
  require "footer.php";
 ?>
