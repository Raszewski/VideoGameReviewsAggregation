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

$gra = $_POST['ngry'];
$opis = $_POST['txtopis'];
$platforma = $_POST['platforma'];
$gatunek = $_POST['gatunek'];
$podgatunek = $_POST['podgatunek'];
$producent = $_POST['producent'];
$wydawca = $_POST['wydawca'];

/*
$sql = "INSERT INTO Platforma (nazwaPlatforma)
VALUES ('$platforma')";
$sql1 = "INSERT INTO Producent (nazwaProducent)
VALUES ('$producent')";
$sql2 = "INSERT INTO Wydawca (idProducent, nazwaWydawca)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), '$wydawca')";
/*$sql3 = "UPDATE Producent SET idWydawca = Wydawca.idWydawca FROM (SELECT idWydawca FROM Wydawca) AS Wydawca WHERE nazwaWydawca='$wydawca'";
$sql3 = "UPDATE Producent SET idWydawca = Wydawca.idWydawca FROM (SELECT idWydawca FROM Wydawca) AS Wydawca WHERE Wydawca.idWydawca = Producent.idWydawca";* /
echo "$wydawca";
$idwydaw = mysqli_query($conn,"SELECT 'idWydawca' FROM 'Wydawca' WHERE nazwaWydawca='".$wydawca."'");
echo "$idwydaw";
  $sql3 = "UPDATE Producent SET idWydawca = '$idwydaw' WHERE nazwaProducent = '$producent'";
  if (mysqli_query($conn, $sql13)) {
    echo 'DZIAŁA';
  } else {
    echo "Error: " . $sql13 . "<br>" . mysqli_error($conn);
  echo " ID NIEEEEEEWYDAWCY DZIALA ";
}


$sql4 = "INSERT INTO Gatunek (nazwaGatunek)
VALUES ('$gatunek')";
$sql5 = "INSERT INTO Podgatunek (idGatunek, nazwaPodgatunek)
VALUES ((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$podgatunek')";
$sql6 = "INSERT INTO Gatunek (idPodgatunek)
VALUES ((SELECT idPodgatunek FROM Podgatunek WHERE nazwaPodgatunek='$podgatunek'))";
$sql7 = "INSERT INTO Gra (idProducent, idGatunek, nazwaGra, opisGra)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), (SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$gra', '$opis')";
$sql8 = "INSERT INTO Gra_jest_na_platformie (idGra, idPlatforma, rodzajDystrybucji)
VALUES ((SELECT idGra FROM Gra WHERE nazwaGra='$gra'), (SELECT idPlatforma FROM Platforma WHERE nazwaPlatforma='$platforma'), '$dystrybucja')";

*****************************

$sql = "INSERT INTO Platforma (nazwaPlatforma)
VALUES ('$platforma')";
$sql1 = "INSERT INTO Producent (nazwaProducent)
VALUES ('$producent')";
$sql2 = "INSERT INTO Wydawca (idProducent, nazwaWydawca)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), '$wydawca')";
$sql3 = "INSERT INTO Producent (idWydawca)
VALUES ((SELECT idWydawca FROM Wydawca WHERE nazwaWydawca='$wydawca'))";
$sql4 = "INSERT INTO Gatunek (nazwaGatunek)
VALUES ('$gatunek')";
$sql5 = "INSERT INTO Podgatunek (idGatunek, nazwaPodgatunek)
VALUES ((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$podgatunek')";
$sql6 = "INSERT INTO Gatunek (idPodgatunek)
VALUES ((SELECT idPodgatunek FROM Podgatunek WHERE nazwaPodgatunek='$podgatunek'))";
$sql7 = "INSERT INTO Gra (idProducent, idGatunek, nazwaGra, opisGra)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), (SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$gra', '$opis')";
$sql8 = "INSERT INTO Gra_jest_na_platformie (idGra, idPlatforma, rodzajDystrybucji)
VALUES ((SELECT idGra FROM Gra WHERE nazwaGra='$gra'), (SELECT idPlatforma FROM Platforma WHERE nazwaPlatforma='$platforma'), '$dystrybucja')";
*/

/*
INSERT BEZ INSERTÓW
$sql = "INSERT INTO Platforma (nazwaPlatforma)
VALUES ('$platforma')";
$sql1 = "INSERT INTO Producent (nazwaProducent)
VALUES ('$producent')";
$sql2 = "INSERT INTO Wydawca (idProducent, nazwaWydawca)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), '$wydawca')";
$sql3 = "INSERT INTO Gatunek (nazwaGatunek)
VALUES ('$gatunek')";
$sql4 = "INSERT INTO Podgatunek (idGatunek, nazwaPodgatunek)
VALUES ((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$podgatunek')";
$sql5 = "INSERT INTO Gra (idProducent, idGatunek, nazwaGra, opisGra)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), (SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$gra', '$opis')";
$sql6 = "INSERT INTO GraNaPlatformie (idGra, idPlatforma, rodzajDystrybucji)
VALUES ((SELECT idGra FROM Gra WHERE nazwaGra='$gra'), (SELECT idPlatforma FROM Platforma WHERE nazwaPlatforma='$platforma'), '$dystrybucja')";

/*

NIC NIE DODAWAĆ w GraNaPlatformie

*/


$sql = "INSERT INTO Producent (nazwaProducent)
VALUES ('$producent')";

$sql1 = "INSERT INTO Gra (idProducent, idPodgatunek, nazwaGra, opisGra)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), (SELECT idPodgatunek FROM Podgatunek WHERE nazwaPodgatunek='$podgatunek'), '$gra', '$opis')";

$sql2 = "INSERT INTO Wydawca (idGra, idPlatforma, nazwaWydawca)
VALUES ((SELECT idGra FROM Gra WHERE nazwaGra='$gra'), (SELECT idPlatforma FROM Platforma WHERE nazwaPlatforma='$platforma'), '$wydawca')";

/*


$sql2 = "INSERT INTO Wydawca (idProducent, nazwaWydawca)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), '$wydawca')";
$sql5 = "INSERT INTO Gra (idProducent, idGatunek, nazwaGra, opisGra)
VALUES ((SELECT idProducent FROM Producent WHERE nazwaProducent='$producent'), (SELECT idGatunek FROM Gatunek WHERE nazwaGatunek='$gatunek'), '$gra', '$opis')";
$sql6 = "INSERT INTO GraNaPlatformie (idGra, idPlatforma, rodzajDystrybucji)
VALUES ((SELECT idGra FROM Gra WHERE nazwaGra='$gra'), (SELECT idPlatforma FROM Platforma WHERE nazwaPlatforma='$platforma'), '$dystrybucja')";
/*
SQL
$sqlPLATFORMA = "INSERT INTO Platforma (nazwaPlatforma) VALUES
('Xbox'),
('Playstation'),
('Switch'),
('Gameboy'),
('PC'),
('Stadia')";

$sqlGATUNEK = "INSERT INTO Gatunek (nazwaGatunek) VALUES
('Fabularna'),
('Akcji-przygodowa'),
('Przygodowa'),
('Akcji'),
('Strategia'),
('Symulacyjna'),
('Sportowa')";

$sqlPODGATUNEK = "INSERT INTO Podgatunek (idGatunek, nazwaPodgatunek) VALUES
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Fabularna'), 'MMORPG'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Fabularna'), 'Rougelike'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Fabularna'), 'Taktyczna'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Fabularna'), 'Akcja'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Fabularna'), 'Open World'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji-przygodowa'), 'Metroidvania'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji-przygodowa'), 'Horror Przetrwania'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Przygodowa'), 'Tekstowa'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Przygodowa'), 'Graficzna'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Przygodowa'), 'Wizualna Nowela'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Przygodowa'), 'Interaktywny Film'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Przygodowa'), 'Przygoda 3D'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Platformowa'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Rytmiczna'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Beat em up'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Strzelanka'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Skradanka'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Survival'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Akcji'), 'Bijatyka'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'RTS'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'RTT'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'MOBA'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'Tower Defence'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'TTB'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'TBS'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Strategia'), 'Wojenna'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Symulacyjna'), 'Pojazdow'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Symulacyjna'), 'Zycia'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Symulacyjna'), 'Budowy i zarzadzania'),

((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Sportowa'), 'Wyscigowa'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Sportowa'), 'Dyscyplin Sportowych'),
((SELECT idGatunek FROM Gatunek WHERE nazwaGatunek ='Sportowa'), 'Walki');"

*/




















if (mysqli_query($conn, $sql)) {
  echo "Pomyślnie dodano ";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn, $sql1)) {
  echo "$gra $opis $platforma $gatunek $podgatunek $producent $wydawca ";
} else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn, $sql2)) {
  echo "do bazy danych!";
} else {
  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
