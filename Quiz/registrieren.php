<?php include("connection.php"); // Datei mit der Datenbankverbindung wird hinzugefügt
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Werte von den Eingabefelder des Formulars werden in Variablen gespeichert
  $username = $_POST['user'];
  $pw = $_POST['pw'];
  // Falsch und Richtig werden für alle Benutzter auf 0 gesetzt
  $w  = 0;
  $l = 0;
  $a = 0;
//eintragen des Passwortes, Benutzername und anderen Variablen in die Datenbank
  if (!empty($username)) { //überprüfung dass das Eingabefeld nicht leer war
    $query = "INSERT INTO `users` (`id`, `name`, `password`, `richtig`, `falsch`, `EU`,`AS`,`AF`,`AU`,`NA`,`SA`) VALUES (NULL, '$username', '$pw', '$w', '$l','$a','$a','$a','$a','$a','$a')";
    mysqli_query($con, $query);
    echo '<p>Sie könne sich <a href="login.php">anmelden</a> !</p>';
  }else {
    echo 'keine Benutztername vorhanden';

  }
}

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrieren</title>
  </head>
  <body>
    <h2>Registrieren</h2>
    <form action="registrieren.php" method="post">
      <input type="text" name = "user"  class=" input" required>
      <input type="password" name ="pw" class = "input" required>
      <input type="submit" value="Absenden">
    </form>
    <a href="login.php">Anmelden</a>
  </body>
</html>
