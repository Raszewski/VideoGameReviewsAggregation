<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();
if (isset($_SESSION['KontoUid'])){
  $nazwagracza = $_SESSION['KontoUid'];
}
else {
  echo "NIC TU NIE MA";
}

$nazwagry = $_POST['nazwaGry'];
$czasgry = $_POST['czasGry'];
$ocena1 = $_POST['ocenaGrafiki'];
$ocena2 = $_POST['ocenaMuzyki'];
$ocena3 = $_POST['ocenaRozgrywki'];
$ocena4 = $_POST['ocenaFabuly'];
$ocena = ($ocena1 + $ocena2 + $ocena3 + $ocena4) /4;
$stopuko = $_POST['ukonczenie'];
$txtrec = $_POST['tekstRecenzji'];
$sql10 ="INSERT INTO Recenzja (idKonto, idGra, czasGry, ocenaGrafiki, ocenaMuzyki, ocenaRozgrywki, ocenaFabuly, ocena, ukonczenie, tekstRecenzji)
VALUES ((SELECT idKonto FROM Konto WHERE nazwaKonto='$nazwagracza'), (SELECT idGra from Gra WHERE nazwaGra='$nazwagry'), '$czasgry', '$ocena1', '$ocena2', '$ocena3', '$ocena4', '$ocena', '$stopuko', '$txtrec')";

if (mysqli_query($conn, $sql10)) {
  echo '<div style="font-size: 100px; text-align: center;"> Twoja ocena dla gry <br>' .$nazwagry. ' to:    </div>';
  echo '<div style="color: red; font-size: 150px; text-align: center;">' .$ocena. '</div>';
  echo '<br>';
  echo '<br>';
  echo '<div style="font-size: 80px; text-align: center;"> Recenzja została dodana pomyślnie! <br> Przekierowanie za 10 sekund...   </div>';
  header( "refresh:11; url=http://localhost/www/konto.php" );
} else {
  echo "Error: " . $sql10 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
