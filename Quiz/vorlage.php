<?php session_start();include("connection.php");include("Func.php");$user_data = check_login($con);
//neue Session wird gestarte
//notwendige Funktionen und Verbindungen werden angeangen
//überprüfung des Benutzer mit der Funktion check_login();
$u_id = $_SESSION['id'];
//Auslesung des datensatzes von dem Benutzer (durch die session id)
$sqlm = "SELECT * FROM `users` HAVING `id` = $u_id";
if ($resm = $con->query($sqlm)) {
  if ($resm->num_rows == 0) {
    echo "Es gibt keine vorhandene Datenbank";
  }else {
    $dsatzm = $resm->fetch_assoc();
    //Speicherung der richtigen falschen und gestellten Fragen
    $richtig = $dsatzm["richtig"];
    $falsch = $dsatzm["falsch"];
    $fragen = $dsatzm["EU"] + $dsatzm["AS"] + $dsatzm["AF"] + $dsatzm["NA"] + $dsatzm["SA"] + $dsatzm["AU"]; //Addition aller Fragen von allen Kontinenten
    $fragen_KO = $dsatzm["$KO"];
    $resm->close(); //Verbindung wird geschlossen
  }
}else {
  exit("Fehler bei der Verbingung zum Datenpaket");
}
$query = "SELECT * FROM `land` WHERE `KNR` LIKE '$KO' "; //Verbindung zur Datenbank mit allen ländern der $KO

$result = $con->query($query);

if ($result->num_rows > 0) {
    // Ausgabe der Daten jeder Zeile (von der $query abfrage) in einer Zeichenkette
    $z = 0; //Zähler um die Länder zu zählen in einem Kontinent
    while($row = $result->fetch_assoc()) {
        $A = $A . $row["Name"] . "::". $row["HauptONR"] . ","; //alle Daten werden in einer Zeichenkette geordnet (Länder werden mit , getrennt und Land und HauptONR mit ::)
        $z = $z +1;
    }
} else {
    echo "0 results";
}
$exploded = explode(",",$A); //split der Zeichenkette zu einem Array (jedes Land)
$mo = $fragen_KO%$z; //modulurechnung (damit das Quiz unendliche lang geht)
$ausgabe = $exploded[$mo]; //wählt das $mo-te Element im Array $exploded
$exploded2 = explode("::",$ausgabe); //split der Zeichenkette zu einem Array (zu Land und Hauptstadt)
$query2 = "SELECT * FROM `ort` WHERE `ONR` LIKE '$exploded2[1]'";
//abfrage nach dem Name der Stadt
$res2 = mysqli_query($con, $query2);
$d = mysqli_fetch_assoc($res2);
$hstadt = $d['Name']; // Name der Hauptstadt wird in einer Variable gespeichert


if($_SERVER['REQUEST_METHOD'] == "POST"){ //Formular wird abgesendet
  //Eingabefeld wird in einer Variable übertragen
  $n_land = $_POST['land'];

  if(!empty($n_land)){ //überprüfung ob das Eingabefeld leer war
    if ($n_land == $exploded2[0]) { //falls die Eingabe gleich dem Land entspricht ($exploded2 ist das zweite Array in dem nur Hauptstadt und Land drin steht)
      //antwort war richtig, gestellt Fragen und richtige Fragen werden um 1 addiert und in der users Datenbank gespeichert
      $fragen_KO = $fragen_KO + 1;
      $richtig = $richtig + 1;
      $query3 = "UPDATE `users` SET `richtig` = '$richtig',`$KO` = '$fragen_KO' WHERE `id` = $u_id";
      mysqli_query($con, $query3);
      echo "Antwort war richtig";
      $helper = 'Location:'. $KO .'.php';
      header($helper); // neuladen der Seite (damit auch die gestellten Fragen usw von der Datenbank neu geladen werden kann)
    }else {
      //antwort war falsch, gestellt Fragen und falsche Fragen werden um 1 addiert und in der users Datenbank gespeichert
      $fragen_KO = $fragen_KO + 1;
      $falsch = $falsch + 1;
      $query4 = "UPDATE `users` SET `falsch` = '$falsch',`$KO` = '$fragen_KO' WHERE `id` = $u_id";
      mysqli_query($con, $query4);
      echo "Antwort war falsch";
      $helper = 'Location:'. $KO .'.php';
      header($helper); // neuladen der Seite (damit auch die gestellten Fragen usw von der Datenbank neu geladen werden kann)
    }

  }else {
    echo "Bitte geben sie den Name des Landes ein";
  }
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title><?php echo $Name_K . '-Quiz'; ?></title>
  </head>
  <body>
    <h2><?php echo $Name_K .  '-Quiz'; ?></h2>
    <form action="<?php $helper2 = $KO .'.php';echo $helper2; ?>" method="post">
      <p>Hauptstadt: <?php echo $hstadt; // die Hauptstadt wird ausgegeben von dem man den Land wissen muss?></p>
      <p>Länder:</p><input type="text" name="land" >
      <br>
      <input type="submit">
      <br>
      <br>
      <p>Gestellte Fragen: </p> <?php echo $fragen; //ausgabe der gestellten Fragen ?>
      <p>Richtige: </p> <?php echo $richtig; //ausgabe der richtigen Fragen ?>
      <p>Falsche: </p><?php echo $falsch; //ausgabe der falschen Fragen ?>
    </form>
    <p>zum <a href="index.php">Menu</a></p>
  </body>
</html>
